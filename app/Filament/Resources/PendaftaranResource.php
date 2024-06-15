<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kampus;
use App\Models\Jurusan;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Fakultas;
use App\Models\JalurTes;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Pendaftaran;
use App\Models\ClusterKampus;
use App\Models\JalurPrestasi;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PendaftaranResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\PendaftaranResource\RelationManagers;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $navigationGroup = 'Beasiswa';

    protected static ?int $navigationSort = 1;
    protected static ?string $title = 'Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
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
                    }),
                Forms\Components\Select::make('id_kampus_1')
                    ->label('Pilih Kampus (pilihan 1)')
                    ->options(fn (Get $get): Collection => Kampus::query()
                        ->where('id_cluster_kampus', $get('id_cluster_kampus_1'))
                        ->where('id', '!=', 5) // hidden UNAIR
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('id_fakultas_1', null);
                        $set('id_jurusan_1', null);
                    }),
                Forms\Components\Select::make('id_fakultas_1')
                    ->label('Pilih Fakultas (pilihan 1)')
                    ->options(fn (Get $get): Collection => Fakultas::query()
                        ->where('id_kampus', $get('id_kampus_1'))
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('id_jurusan_1', null)),
                Forms\Components\Select::make('id_jurusan_1')
                    ->label('Pilih Jurusan (pilihan 1)')
                    ->options(fn (Get $get): Collection => Jurusan::query()
                        ->where('id_fakultas', $get('id_fakultas_1'))
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live(),
                Forms\Components\Select::make('id_fakultas_2')
                    ->label('Pilih Fakultas (pilihan 2)')
                    ->options(fn (Get $get): Collection => Fakultas::query()
                        ->where('id_kampus', $get('id_kampus_1'))
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
                    ->maxLength(255),

                Forms\Components\Select::make('id_jalur_prestasi')
                    ->label('Pilih Jalur Prestasi')
                    ->options(fn () => JalurPrestasi::all()->pluck('nama', 'id'))
                    ->placeholder('Pilih jalur')
                    ->preload()
                    ->live()
                    ->visible(fn (Get $get): bool => $get('id_cluster_kampus_1') == 1),
                Forms\Components\TextInput::make('deskripsi_prestasi')
                    ->label('Deskripsi MTQ (ex: Cabang Tilawah, Juara 1)')
                    ->placeholder('Cabang MTQ, Juara ...')
                    ->visible(fn (Get $get): bool => in_array($get('id_jalur_prestasi'), [5, 6, 7, 8])),

                Forms\Components\TextInput::make('no_kipk')
                    ->label('Nomor KIPK')
                    ->visible(fn (Get $get): bool => $get('id_kampus_1') == 16),


                Forms\Components\Select::make('id_jalur_tes')
                    ->label('Pilih Jalur Tes')
                    ->live()
                    ->options(fn () => JalurTes::all()->pluck('nama', 'id'))
                    ->placeholder('Pilih jalur')
                    ->afterStateUpdated(function (Set $set) {
                        $set('no_pendaftaran_tes', null);
                    })
                    ->required(),
                Forms\Components\TextInput::make('no_pendaftaran_tes')
                    ->label('Nomor Pendaftaran Tes')
                    ->visible(fn (Get $get): bool => $get('id_jalur_tes') == 1),
                Forms\Components\Select::make('status_tes')
                    ->label('Status UTBK')
                    ->options([
                        'Lulus UTBK' => 'Lulus',
                        'Tidak Lulus UTBK' => 'Tidak Lulus',
                    ]),

                Forms\Components\Select::make('status_daftar_ulang')
                    ->label('Status Daftar Ulang')
                    ->options([
                        'Sudah Daftar Ulang' => 'Sudah Daftar Ulang',
                        'Belum Daftar Ulang' => 'Belum Daftar Ulang',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename(fn () =>  'Data Pendaftar - ' . date('Y-m-d_h-i-s'))
                            ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                    ]),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('No Pendaftaran Beasiswa PWNU')
                    ->alignment('center')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Peserta')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('kampus1.nama')
                    ->label('Kampus (Pilihan 1)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('fakultas1.nama')
                    ->label('Fakultas (Pilihan 1)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('jurusan1.nama')
                    ->label('Jurusan (Pilihan 1)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('fakultas2.nama')
                    ->label('Fakultas (Pilhan 2)')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tidak ada')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('jurusan2.nama')
                    ->label('Jurusan (Pilihan 2)')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tidak ada')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('no_pendaftaran_kampus')
                    ->label('No. Pendaftaran Kampus')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('bukti_pendaftaran_kampus')
                    ->label('Bukti Pendaftaran Kampus')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->bukti_pendaftaran_kampus, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jalur_prestasi.nama')
                    ->label('Jalur Prestasi')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deskripsi_prestasi')
                    ->label('Deskripsi Prestasi (khusus MTQ)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_prestasi')
                    ->label('Bukti Prestasi')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->bukti_prestasi, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('no_kipk')
                    ->label('No. KIP-K')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_kipk')
                    ->label('Bukti KIP-K')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->bukti_kipk, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('jalur_tes.nama')
                    ->label('Jalur Tes')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status_tes')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_pendaftaran_tes')
                    ->label('No. Pendaftaran Tes')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_pendaftaran_tes')
                    ->label('Bukti Pendaftaran Tes')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->bukti_pendaftaran_tes, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('surat_rekom_pondok')
                    ->label('Surat Rekomendasi Pondok')
                    ->placeholder('Belum Upload')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->surat_rekom_pondok, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('surat_rekom_pcnu')
                    ->label('Surat Rekomendasi PCNU')
                    ->placeholder('Belum Upload')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/public/storage/' . $record->surat_rekom_pcnu, true)
                    ->prefix('https://beasiswa.pwnujatim.or.id/public/storage/')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('penilaian.nilai_tes_tulis')
                    ->label('Nilai Tes Tulis')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('penilaian.nilai_tes_praktek')
                    ->label('Nilai Tes Praktek')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                ExportBulkAction::make(),
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
