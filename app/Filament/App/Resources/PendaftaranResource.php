<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PendaftaranResource\Pages;
use App\Filament\App\Resources\PendaftaranResource\RelationManagers;

use App\Models\User;
use App\Models\Kampus;
use App\Models\Pondok;
use App\Models\Sekolah;
use App\Models\Jurusan;
use App\Models\Beasiswa;
use App\Models\JalurPrestasi;
use App\Models\ClusterBeasiswa;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Select;
use Illuminate\Support\Collection;

class PendaftaranResource extends Resource
{
    protected static ?string $user = User::class;
    protected static ?string $kampus = Kampus::class;
    protected static ?string $jurusan = Jurusan::class;
    protected static ?string $model = Beasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Profil')
                        ->schema([
                            Forms\Components\TextInput::make('Nama')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('Tempat Lahir')
                                ->required()
                                ->maxLength(255),
                                Forms\Components\DatePicker::make('tanggal_lahir')
                                ->required(),
                            Forms\Components\TextInput::make('No Handphone')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('No Handphone yang dapat dihubungi')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('asal_sekolah')
                                ->required()
                                ->options(Sekolah::all()->pluck('nama', 'id')),
                            Forms\Components\Select::make('pondok')
                                ->required()
                                ->options(Pondok::all()->pluck('nama', 'id')),

                        ]),
                    Wizard\Step::make('Pendaftaran')
                        ->schema([
                            Forms\Components\Select::make('Jalur Prestasi')
                            ->options(JalurPrestasi::all()->pluck('nama', 'id')),
                            Forms\Components\Select::make('cluster_id')
                                ->relationship(name:'cluster', titleAttribute:'nama')
                                ->options(function (): array {
                                    return ClusterBeasiswa::all()->pluck('nama', 'id')->toArray();})
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(
                                    function (Set $set) {
                                        $set('kampus_pilihan_1', null);
                                        $set('kampus_pilihan_2', null);
                                    }
                                )
                                ->required(),
                            Forms\Components\Select::make('kampus_pilihan_1')
                                ->required()
                                ->options(fn (Get $get): Collection => Kampus::query()
                                    ->where('cluster_id', $get('cluster_id'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(
                                    function (Set $set) {
                                        $set('jurusan_kampus_1', null);
                                    }
                                )
                                ,
                            Forms\Components\Select::make('kampus_pilihan_2')
                                ->required()
                                ->options(fn (Get $get): Collection => Kampus::query()
                                    ->where('cluster_id', $get('cluster_id'))
                                    ->pluck('nama', 'id'))
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(
                                    function (Set $set) {
                                        $set('jurusan_kampus_2', null);
                                    }
                                ),
                            Forms\Components\Select::make('jurusan_kampus_1')
                                ->required()
                                ->options(fn (Get $get): Collection => Jurusan::query()
                                    ->where('kampus_id', $get('kampus_pilihan_1'))
                                    ->pluck('nama', 'id'))
                                ->preload(),
                            Forms\Components\Select::make('jurusan_kampus_2')
                                ->required()
                                ->options(fn (Get $get): Collection => Jurusan::query()
                                    ->where('kampus_id', $get('kampus_pilihan_2'))
                                    ->pluck('nama', 'id'))
                                ->preload(),
                            Forms\Components\FileUpload::make('berkas_1')
                                ->acceptedFileTypes(['pdf']),
                            Forms\Components\FileUpload::make('berkas_2')
                                ->acceptedFileTypes(['pdf']),
                        ]),
                ])
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

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
