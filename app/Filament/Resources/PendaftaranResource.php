<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use App\Models\Pendaftaran;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;
    protected static ?string $user = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $navigationGroup = 'Beasiswa';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_pendaftaran_tes')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_pendaftaran_kampus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_pendaftaran_pwnu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_kipk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_tes')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_pwnu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bukti_kipk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bukti_prestasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bukti_pendaftaran_tes')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bukti_pendaftaran_kampus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('surat_rekom_pondok')
                    ->maxLength(255),
                Forms\Components\TextInput::make('surat_rekom_pcnu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_jurusan_1')
                    ->numeric(),
                Forms\Components\TextInput::make('id_fakultas_1')
                    ->numeric(),
                Forms\Components\TextInput::make('id_kampus_1')
                    ->numeric(),
                Forms\Components\TextInput::make('id_cluster_kampus_1')
                    ->numeric(),
                Forms\Components\TextInput::make('id_jurusan_2')
                    ->numeric(),
                Forms\Components\TextInput::make('id_fakultas_2')
                    ->numeric(),
                Forms\Components\TextInput::make('id_kampus_2')
                    ->numeric(),
                Forms\Components\TextInput::make('id_cluster_kampus_2')
                    ->numeric(),
                Forms\Components\TextInput::make('id_jalur_prestasi')
                    ->numeric(),
                Forms\Components\TextInput::make('id_jalur_tes')
                    ->numeric(),
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
                        ->withFilename(fn () =>  'Data Pendaftar - ' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                ]), 
            ])
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('No Pendaftaran Beasiswa PWNU')
                    ->alignment('center')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Peserta')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jurusan1.nama')
                    ->label('Jurusan (Pilihan 1)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fakultas1.nama')
                    ->label('Fakultas (Pilihan 1)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kampus1.nama')
                    ->label('Kampus (Pilihan 1)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jurusan2.nama')
                    ->label('Jurusan (Pilihan 2)')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tidak ada')
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('fakultas2.nama')
                    ->label('Fakultas (Pilhan 2)')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tidak ada')
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('no_pendaftaran_tes')
                    ->label('No. Pendaftaran Tes')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_pendaftaran_tes')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_pendaftaran_kampus')
                    ->label('No. Pendaftaran Kampus')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_pendaftaran_kampus')
                    ->label('Bukti Pendaftaran Kampus')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/storage/' . $record->bukti_pendaftaran_kampus, true)
                    ->toggleable(isToggledHiddenByDefault:true),
                Tables\Columns\TextColumn::make('no_kipk')
                    ->label('No. KIP-K')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bukti_kipk')
                    ->label('Bukti KIP-K')
                    ->url(fn ($record) => 'https://beasiswa.pwnujatim.or.id/storage/' . $record->bukti_kipk, true)
                    ->toggleable(isToggledHiddenByDefault:true),

                Tables\Columns\TextColumn::make('status_tes')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status_pwnu')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('jalur_tes.nama')
                    ->label('Jalur Tes')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('surat_rekom_pondok')
                    ->searchable()
                    ->placeholder('Belum Upload')
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('surat_rekom_pcnu')
                    ->searchable()
                    ->placeholder('Belum Upload')
                    ->toggleable(isToggledHiddenByDefault: false),

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
