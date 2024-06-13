<?php

namespace App\Filament\App\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class UpdateStatusDaftarUlang extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static string $view = 'filament.app.pages.update-status-daftar-ulang';
    protected static ?string $title = 'Status Daftar Ulang Kampus';
    protected static ?string $model = Pendaftaran::class;
    protected static ?string $navigationLabel = 'Status Daftar Ulang Kampus';
    protected static ?string $navigationGroup = 'Beasiswa';

    public static function canAccess(): bool
    {
        if (auth()->user()->pendaftaran != null) {
            if ((auth()->user()->pendaftaran->id_jalur_tes == 1)) {
                if (auth()->user()->pendaftaran->status_tes == 'Tidak Lulus UTBK') {
                    return true;
                }
            }
        }
        return false;
    }

    public function mount(): void
    {
        $this->form->fill(auth()->user()->pendaftaran->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Daftar Ulang Kampus')
                    ->schema([
                        Select::make('status_daftar_ulang')
                            ->label('Status Daftar Ulang')
                            ->options([
                                'Sudah Daftar Ulang' => 'Sudah Daftar Ulang',
                                'Belum Daftar Ulang' => 'Belum Daftar Ulang',
                            ]),
                        FileUpload::make('bukti_daftar_ulang')
                            ->label('Bukti Daftar Ulang')
                            ->acceptedFileTypes(['image/*', 'application/pdf'])
                            ->downloadable()
                            ->openable(),
                    ])
                ])
                ->submitAction(new HtmlString(Blade::render(
                    <<<BLADE
                        <x-filament::button
                            type="submit"
                            color="primary"
                            class="mt-4">
                        Submit
                        </x-filament::button>
                    BLADE
                )))
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            auth()->user()->pendaftaran->update($data);
            redirect()->route('filament.app.pages.dashboard');
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Status Daftar Ulang berhasil diupdate')
            ->send();
    }
}
