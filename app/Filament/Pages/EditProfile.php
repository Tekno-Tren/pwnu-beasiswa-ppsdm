<?php

namespace App\Filament\Pages;

use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Pondok;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Edit Profil';
    protected static string $view = 'filament.app.pages.edit-profile';

    public ?array $profileData = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        $this->fillForms();
    }
    protected function getForms(): array
    {
        return [
            'editGeneralProfileForm',
            'editPasswordForm',
        ];
    }

    public function editGeneralProfileForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Profil')
                    ->aside()
                    ->description('Perbarui informasi profil Anda.')
                    ->schema([
                        Tabs::make('tabs')
                            ->tabs([
                                Tabs\Tab::make('general')
                                    ->label('Informasi Umum')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Nama')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('tempat_lahir')
                                            ->label('Tempat Lahir')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir')
                                            ->label('Tanggal Lahir')
                                            ->required()
                                            ->rule(['date']),
                                        Forms\Components\TextInput::make('alamat')
                                            ->label('Alamat')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('no_hp_1')
                                            ->label('No. Handphone')
                                            ->required()
                                            ->rule(['numeric']),
                                        Forms\Components\TextInput::make('no_hp_2')
                                            ->label('No. HP Alternatif')
                                            ->helperText('No. HP yang dapat dihubungi')
                                            ->required()
                                            ->rule(['numeric']),
                                    ]),
                                Tabs\Tab::make('school')
                                    ->label('Informasi Sekolah')
                                    ->schema([
                                        Forms\Components\Select::make('id_sekolah')
                                            ->label('Asal Sekolah')
                                            ->relationship('sekolah', 'nama')
                                            ->preload()
                                            ->required()
                                            // ->options(Sekolah::all()->pluck('nama', 'id')),
                                    ]),
                                Tabs\Tab::make('pondok')
                                    ->label('Informasi Pondok')
                                    ->schema([
                                        Forms\Components\Select::make('id_pondok')
                                            ->label('Asal Pondok')
                                            ->relationship('pondok', 'nama')
                                            ->preload()
                                            ->required()
                                            // ->options(Pondok::all()->pluck('nama', 'id')),
                                    ]),
                            ]),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

    public function editPasswordForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Update Password')
                    ->aside()
                    ->description('Perbarui kata sandi Anda, pastikan cukup kuat dan aman.')
                    ->schema([
                Forms\Components\TextInput::make('Current password')
                    ->label('Password Saat Ini')
                    ->password()
                    ->required()
                    ->currentPassword(),
                Forms\Components\TextInput::make('password')
                    ->label('Password Baru')
                    ->password()
                    ->required()
                    ->rule(Password::default())
                    ->autocomplete('new-password')
                    ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                    ->live(debounce: 500)
                    ->same('passwordConfirmation'),
                Forms\Components\TextInput::make('passwordConfirmation')
                    ->label('Konfirmasi Password Baru')
                    ->password()
                    ->required()
                    ->dehydrated(false),
                ]),
            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    protected function getUser(): Authenticatable & Model
    {
        $user = Filament::auth()->user();
        if (! $user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }
        return $user;
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();
        $this->editGeneralProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }

    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editGeneralProfileForm'),
        ];
    }

    protected function getUpdatePasswordFormActions(): array
    {
        return [
            Action::make('updatePasswordAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editPasswordForm'),
        ];
    }

    public function updateProfile(): void
    {
        $data = $this->editGeneralProfileForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        $this->sendSuccessNotification();
    }

    public function updatePassword(): void
    {
        $data = $this->editPasswordForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        if (request()->hasSession() && array_key_exists('password', $data)) {
            request()->session()->put(['password_hash_' . Filament::getAuthGuard() => $data['password']]);
        }
        $this->editPasswordForm->fill();
        $this->sendSuccessNotification();
    }

    private function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}
