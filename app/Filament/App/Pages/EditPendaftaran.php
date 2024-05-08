<?php

namespace App\Filament\App\Pages;

use App\Models\Kampus;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\ClusterKampus;
use App\Models\JalurTes;
use App\Models\JalurPrestasi;
use App\Models\Pendaftaran;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

use Illuminate\Support\Collection;
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
                            Forms\Components\Select::make('id_cluster_kampus')
                                ->label('Pilih Cluster Kampus')
                                ->options(ClusterKampus::all()->pluck('nama', 'id'))
                                ->live()
                                ->afterStateUpdated(function (Set $set) {
                                    $set('id_kampus', null);
                                    $set('id_fakultas', null);
                                    $set('id_jurusan', null);
                                    $set('id_jalur_prestasi', null);
                                    $set('bukti_prestasi', null);
                                })
                                ->required(),
                            Forms\Components\Select::make('id_kampus')
                                ->label('Pilih Kampus')
                                ->options(fn (Get $get): Collection => Kampus::query()
                                    ->where('id_cluster_kampus', $get('id_cluster_kampus'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(function (Set $set) {
                                    $set('id_fakultas', null);
                                    $set('id_jurusan', null);
                                })
                                ->required(),
                            Forms\Components\Select::make('id_fakultas')
                                ->label('Pilih Fakultas')
                                ->options(fn (Get $get): Collection => Fakultas::query()
                                    ->where('id_kampus', $get('id_kampus'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(fn (Set $set) => $set('id_jurusan', null))
                                ->required(),
                            Forms\Components\Select::make('id_jurusan')
                                ->label('Pilih Jurusan')
                                ->options(fn (Get $get): Collection => Jurusan::query()
                                    ->where('id_fakultas', $get('id_fakultas'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->required(),
                            Forms\Components\TextInput::make('no_pendaftaran_kampus')
                                ->label('Nomor Pendaftaran Kampus')
                                ->required(),
                            Forms\Components\FileUpload::make('bukti_pendaftaran_kampus')
                                ->label('Bukti Pendaftaran Kampus')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->downloadable(),
                            Forms\Components\Select::make('id_jalur_prestasi')
                                ->label('Pilih Jalur Prestasi')
                                ->options(fn () => JalurPrestasi::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->preload()
                                ->visible(fn (Get $get): bool => $get('id_cluster_kampus') == 1),
                            Forms\Components\FileUpload::make('bukti_prestasi')
                                ->label('Bukti Prestasi')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->downloadable()
                                ->visible(fn (Get $get): bool => $get('id_cluster_kampus') == 1)
                                ->openable(),
                        ]),
                    Wizard\Step::make('Jalur Tes yang Diikuti')
                        ->schema([
                            Forms\Components\Select::make('id_jalur_tes')
                                ->label('Pilih Jalur Tes')
                                ->options(fn () => JalurTes::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->afterStateUpdated(function (Set $set) {
                                    $set('no_pendaftaran_tes', null);
                                })
                                ->required(),
                            Forms\Components\TextInput::make('no_pendaftaran_tes')
                                ->label('Nomor Pendaftaran Tes'),
                            Forms\Components\FileUpload::make('bukti_pendaftaran_tes')
                                ->label('Bukti Pendaftaran Tes')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable(),
                        ]),
                    Wizard\Step::make('Rekomendasi')
                        ->schema([
                            Forms\Components\FileUpload::make('surat_rekom_pondok')
                                ->label('Surat Rekomendasi Pondok')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable(),
                            Forms\Components\FileUpload::make('surat_rekom_pcnu')
                                ->label('Surat Rekomendasi PCNU')
                                ->acceptedFileTypes(['application/pdf'])
                                ->downloadable()
                                ->openable(),
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
                redirect()->to('/dashboard');
            } else {
                auth()->user()->pendaftaran->update($data);
                redirect()->to('/dashboard');
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
