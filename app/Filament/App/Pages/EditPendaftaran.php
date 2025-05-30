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

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $navigationGroup = 'Beasiswa';

    protected static string $view = 'filament.app.pages.edit-pendaftaran';
    protected static ?string $title = 'Pendaftaran';
    protected static ?string $model = Pendaftaran::class;

    // public static function canAccess(): bool
    // {
    //     if (auth()->user()->isAdmin())
    //     {
    //         return true;
    //     }
    //     return false;
    // }

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
                            Forms\Components\Select::make('id_cluster_kampus_1')
                                ->label('Pilih Cluster Kampus (pilihan 1)')
                                ->options(ClusterKampus::all()->pluck('nama', 'id'))
                                ->live()
                                ->afterStateUpdated(function (Set $set) {
                                    $set('id_kampus_1', null);
                                    $set('id_fakultas_1', null);
                                    $set('id_jurusan_1', null);
                                    $set('id_jalur_prestasi', null);
                                    $set('bukti_prestasi', null);
                                })
                                ->required(),
                            Forms\Components\Select::make('id_kampus_1')
                                ->label('Pilih Kampus (pilihan 1)')
                                ->options(fn (Get $get): Collection => Kampus::query()
                                    ->where('id_cluster_kampus', $get('id_cluster_kampus_1'))
                                    ->where('id', '!=', 5) // hidden UNAIR
                                    ->where('id', '!=', 6) // hidden UM
                                    ->where('id', '!=', 9) // hidden UNIRA
                                    ->where('id', '!=', 10) // hidden UNUSIDA
                                    ->where('id', '!=', 11) // hidden UNWAHA
                                    ->where('id', '!=', 12) // hidden UNU Pasuruan
                                    ->where('id', '!=', 13) // hidden STAI
                                    ->where('id', '!=', 14) // hidden STAI
                                    ->where('id', '!=', 15) // hidden STAI
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(function (Set $set) {
                                    $set('id_fakultas_1', null);
                                    $set('id_jurusan_1', null);
                                })
                                ->required(),
                            Forms\Components\Select::make('id_fakultas_1')
                                ->label('Pilih Fakultas (pilihan 1)')
                                ->options(fn (Get $get): Collection => Fakultas::query()
                                    ->where('id_kampus', $get('id_kampus_1'))
                                    ->where('id', '!=', 9) // hidden FKK ITS
                                    ->where('id', '!=', 62) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 64) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 65) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 66) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 80) // hidden Kedokteran UPN
                                    ->where('id', '!=', 89) // hidden Kedokteran UB
                                    ->where('id', '!=', 95) // hidden Kedokteran UB
                                    ->where('id', '!=', 97) // hidden Kedokteran UB
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(fn (Set $set) => $set('id_jurusan_1', null))
                                ->required(),
                            Forms\Components\Select::make('id_jurusan_1')
                                ->label('Pilih Jurusan (pilihan 1)')
                                ->options(fn (Get $get): Collection => Jurusan::query()
                                    ->where('id_fakultas', $get('id_fakultas_1'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->required(),

                            // Forms\Components\Select::make('id_cluster_kampus_2')
                            //     ->label('Pilih Cluster Kampus (pilihan 2)')
                            //     ->options(ClusterKampus::all()->pluck('nama', 'id'))
                            //     ->live()
                            //     ->afterStateUpdated(function (Set $set) {
                            //         $set('id_kampus_2', null);
                            //         $set('id_fakultas_2', null);
                            //         $set('id_jurusan_2', null);
                            //         $set('id_jalur_prestasi', null);
                            //         $set('bukti_prestasi', null);
                            //     })
                            //     ->required(),
                            // Forms\Components\Select::make('id_kampus_2')
                            //     ->label('Pilih Kampus (pilihan 2)')
                            //     ->options(fn (Get $get): Collection => Kampus::query()
                            //         ->where('id_cluster_kampus_2', $get('id_cluster_kampus_2'))
                            //         ->pluck('nama', 'id'))
                            //     ->searchable()
                            //     ->live()
                            //     ->afterStateUpdated(function (Set $set) {
                            //         $set('id_fakultas_2', null);
                            //         $set('id_jurusan_2', null);
                            //     })
                            //     ->required(),
                            Forms\Components\Select::make('id_fakultas_2')
                                ->label('Pilih Fakultas (pilihan 2)')
                                ->options(fn (Get $get): Collection => Fakultas::query()
                                    ->where('id_kampus', $get('id_kampus_1'))
                                    ->where('id', '!=', 9) // hidden FKK ITS
                                    ->where('id', '!=', 62) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 64) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 65) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 66) // hidden Kedokteran UNAIR
                                    ->where('id', '!=', 80) // hidden Kedokteran UPN
                                    ->where('id', '!=', 89) // hidden Kedokteran UB
                                    ->where('id', '!=', 95) // hidden Kedokteran UB
                                    ->where('id', '!=', 97) // hidden Kedokteran UB
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(fn (Set $set) => $set('id_jurusan_2', null)),
                            Forms\Components\Select::make('id_jurusan_2')
                                ->label('Pilih Jurusan (pilihan 2)')
                                ->options(fn (Get $get): Collection => Jurusan::query()
                                    ->where('id_fakultas', $get('id_fakultas_2'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->live(),

                            Forms\Components\TextInput::make('no_pendaftaran_kampus')
                                ->label('Nomor Pendaftaran Kampus')
                                ->required(),
                            Forms\Components\FileUpload::make('bukti_pendaftaran_kampus')
                                ->label('Bukti Pendaftaran Kampus / Kartu Peserta')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => $get('id') . '_bukti-pendaftaran-kampus')
                                ->downloadable(),

                            Forms\Components\Select::make('id_jalur_prestasi')
                                ->label('Pilih Jalur Prestasi')
                                ->options(fn () => JalurPrestasi::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->preload()
                                ->live(),
                                // ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') == 1),
                            Forms\Components\TextInput::make('deskripsi_prestasi')
                                ->label('Deskripsi MTQ (ex: Cabang Tilawah, Juara 1)')
                                ->placeholder('Cabang MTQ, Juara ...')
                                ->visible(fn (Get $get): bool => in_array($get('id_jalur_prestasi'), [5, 6, 7, 8])),
                            Forms\Components\FileUpload::make('bukti_prestasi')
                                ->label('Bukti Prestasi')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->multiple()
                                ->downloadable()
                                // ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') == 1)
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => dd($get('id')) . '_bukti-prestasi')
                                ->openable(),

                            Forms\Components\TextInput::make('no_kipk')
                                ->label('Nomor KIPK')
                                ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') == 3),
                            Forms\Components\FileUpload::make('bukti_kipk')
                                ->label('Bukti KIPK')
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') == 3)
                                // ->getUploadedFileNameForStorageUsing(
                                    //     fn (Get $get): string => $get('id') . '_bukti-kipk')
                                ->downloadable(),
                        ]),
                    Wizard\Step::make('Jalur Tes yang Diikuti')
                        ->schema([
                            Forms\Components\Select::make('id_jalur_tes')
                                ->label('Pilih Jalur Tes')
                                ->live()
                                ->options(fn () => JalurTes::all()->pluck('nama', 'id'))
                                ->placeholder('Pilih jalur')
                                ->afterStateUpdated(function (Set $set) {
                                    $set('no_pendaftaran_tes', null);
                                })
                                ->searchable()
                                ->required(),
                            Forms\Components\TextInput::make('no_pendaftaran_tes')
                                ->label('Nomor Pendaftaran Tes')
                                ->visible(fn (Get $get): bool => $get('id_jalur_tes') != 99), // 99 = Tidak Ikut Tes
                            Forms\Components\FileUpload::make('bukti_pendaftaran_tes')
                                ->label('Bukti Pendaftaran Tes / Kartu Peserta')
                                ->visible(fn (Get $get): bool => $get('id_jalur_tes') != 99)
                                ->acceptedFileTypes(['application/pdf'])
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => $get('id') . '_bukti-pendaftaran-tes')
                                ->downloadable()
                                ->openable(),
                        ]),
                    Wizard\Step::make('Rekomendasi')
                        ->schema([
                            Forms\Components\FileUpload::make('surat_rekom_pondok')
                                ->label('Surat Rekomendasi Pondok')
                                ->acceptedFileTypes(['application/pdf'])
                                // ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') != 2)
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => $get('id') . '_surat-rekom-pondok')
                                ->downloadable()
                                ->openable(),
                            Forms\Components\FileUpload::make('surat_rekom_pcnu')
                                ->label('Surat Rekomendasi PCNU atau Lembaga Banom NU Jawa Timur')
                                ->acceptedFileTypes(['application/pdf'])
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => $get('id') . '_surat-rekom-pcnu')
                                ->downloadable()
                                ->openable(),
                            Forms\Components\FileUpload::make('surat_pernyataan')
                                ->label('Surat Pernyataan')
                                ->acceptedFileTypes(['application/pdf'])
                                // ->getUploadedFileNameForStorageUsing(
                                //     fn (Get $get): string => $get('id') . '_surat-rekom-pcnu')
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
            $data['bukti_prestasi'] = is_array($data['bukti_prestasi'] ?? null) 
                ? implode(',', $data['bukti_prestasi']) 
                : ($data['bukti_prestasi'] ?? '');

            if (! auth()->user()->pendaftaran) {
                Pendaftaran::create($data + ['id_user' => auth()->id(), 'status_daftar_ulang' => 'Belum Daftar Ulang']);
                redirect()->route('filament.app.pages.edit-pendaftaran');
            } else {
                auth()->user()->pendaftaran->update($data);
                redirect()->route('filament.app.pages.edit-pendaftaran');
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

    public function getStatus(): bool
    {
        if (auth()->user()->pendaftaran) {
            return true;
        }
        return false;
    }

    public function getIdPendaftaran(): int
    {
        return auth()->user()->pendaftaran->id ?? 0;
    }

    public function getJalurUTBK(): bool
    {
        if (auth()->user()->pendaftaran->id_jalur_tes != 99) {
            if (auth()->user()->pendaftaran->status_tes == null) {
                return true;
            }
        }
        return false;
    }

    public function getStatusDaftarUlang(): bool
    {
        if (!(auth()->user()->pendaftaran->status_daftar_ulang == 'Sudah Daftar Ulang')) {
            if (auth()->user()->pendaftaran->id_jalur_tes != 99) {
                if (auth()->user()->pendaftaran->status_tes == 'Tidak Lulus UTBK') {
                    return true;
                }
            }
            elseif (auth()->user()->pendaftaran->id_jalur_tes == 99) {
                return true;
            }
        }
        return false;
    }

    protected function afterCreate(): void {
        // rename file bukti_prestasi
        $pendaftaran = Pendaftaran::find($this->getIdPendaftaran());
        $pendaftaran->bukti_prestasi->storeAs($pendaftaran->id . '_bukti-prestasi');
    }
}
