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
use Illuminate\Queue\InteractsWithQueue;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Concerns\InteractsWithFormActions;

class UpdateStatusUtbk extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static string $view = 'filament.app.pages.update-status-utbk';
    protected static ?string $title = 'Update Status UTBK';
    protected static ?string $model = Pendaftaran::class;
    protected static ?string $navigationLabel = 'Update Status UTBK';
    protected static ?string $navigationGroup = 'Beasiswa';

    public static function canAccess(): bool
    {
        if (auth()->user()->pendaftaran != null) {
            if (auth()->user()->pendaftaran->id_jalur_tes == 1) {
                if (auth()->user()->pendaftaran->status_tes == null) {
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
                    Wizard\Step::make('Hasil UTBK')
                    ->schema([
                        Select::make('status_tes')
                            ->label('Status UTBK')
                            ->options([
                                'Lulus UTBK' => 'Lulus',
                                'Tidak Lulus UTBK' => 'Tidak Lulus',
                            ])
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
            ->title('Status UTBK berhasil diupdate')
            ->send();
    }
}
