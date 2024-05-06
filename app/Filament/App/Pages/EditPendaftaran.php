<?php

namespace App\Filament\App\Pages;

use App\Models\Kampus;
use App\Models\JalurTes;
use App\Models\JalurPrestasi;
use App\Models\Pendaftaran;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;

class EditPendaftaran extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.app.pages.edit-pendaftaran';
    protected static ?string $title = 'Pendaftaran';
    protected static ?string $model = Pendaftaran::class;
    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $navigationGroup = 'Beasiswa';

    public function mount(): void
    {
        if (! auth()->user()->pendaftaran) {
            $this->form->fill();
        } else {
            $this->form->fill(auth()->user()->pendaftaran->attributesToArray());
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Jalur Kampus dan Prestasi')
                        ->schema([
                            Forms\Components\Select::make('id_kampus_prestasi')
                                ->label('Pilih Kampus Tujuan Kluster Prestasi Keagamaan')
                                ->options(fn () => Kampus::where('id_cluster_kampus', 1)->pluck('nama', 'id'))
                                ->placeholder('Pilih kampus')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('id_kampus_mandiri')
                                ->label('Pilih Kampus Tujuan Kluster Mandiri')
                                ->options(fn () => Kampus::where('id_cluster_kampus', 2)->pluck('nama', 'id'))
                                ->placeholder('Pilih kampus')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('id_kampus_ptnu')
                                ->label('Pilih Kampus Tujuan Kluster PTNU')
                                ->options(fn () => Kampus::where('id_cluster_kampus', 3)->pluck('nama', 'id'))
                                ->placeholder('Pilih kampus')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('id_jalur_prestasi')
                                ->label('Pilih Jalur Prestasi')
                                ->options(fn () => JalurPrestasi::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->preload()
                                ->required(),
                            Forms\Components\FileUpload::make('bukti_prestasi')
                                ->label('Bukti Prestasi')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->downloadable()
                                ->openable(),
                        ]),
                    Wizard\Step::make('Jalur Tes yang Diikuti')
                        ->schema([
                            Forms\Components\Select::make('id_jalur_tes')
                                ->label('Pilih Jalur Tes')
                                ->options(fn () => JalurTes::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->required(),
                            Forms\Components\TextInput::make('no_pendaftaran_tes')
                                ->label('Nomor Pendaftaran Tes')
                                ->required(),
                            Forms\Components\FileUpload::make('bukti_pendaftaran_tes')
                                ->label('Bukti Pendaftaran Tes')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable()
                                ->required(),
                        ]),
                    Wizard\Step::make('Rekomendasi')
                        ->schema([
                            Forms\Components\FileUpload::make('surat_rekom_pondok')
                                ->label('Surat Rekomendasi Pondok')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable()
                                ->required(),
                            Forms\Components\FileUpload::make('surat_rekom_pcnu')
                                ->label('Surat Rekomendasi PCNU')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable()
                                ->required(),
                        ]),
                ])
                ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                BLADE)))
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            if (! auth()->user()->pendaftaran) {
                Pendaftaran::create($data + ['id_user' => auth()->id()]);
            } else {
                auth()->user()->pendaftaran->update($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
