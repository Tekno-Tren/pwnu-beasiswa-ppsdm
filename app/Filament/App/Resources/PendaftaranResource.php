<?php

namespace App\Filament\App\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;
use App\Models\Beasiswa;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranResource extends Resource
{
    protected static ?string $beasiswa = Beasiswa::class;
    // protected static ?string $user = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate',
        $navigationLabel = 'Pendaftaran',
        $navigationGroup = 'Beasiswa';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Wizard::make([
                //     Wizard\Step::make('Profil')
                //         ->schema([
                //             Forms\Components\TextInput::make('Nama')
                //                 ->required()
                //                 ->relationship('user', 'name'),
                //             Forms\Components\TextInput::make('Tempat Lahir')
                //                 ->required()
                //                 ->relationship('user', 'tempat_lahir'),
                //             Forms\Components\DatePicker::make('tanggal_lahir')
                //                 ->required()
                //                 ->relationship('user', 'tanggal_lahir'),
                //             Forms\Components\TextInput::make('No Handphone')
                //                 ->required()
                //                 ->relationship('user', 'no_hp_1'),
                //             Forms\Components\TextInput::make('No Handphone yang dapat dihubungi')
                //                 ->required()
                //                 ->relationship('user', 'no_hp_2'),
                //             Forms\Components\Select::make('jurusan_id')
                //                 ->required()
                //                 ->relationship('jurusan', 'nama'),
                //         ]),
                //     Wizard\Step::make('Pendaftaran')
                //         ->schema([
                //             Forms\Components\Select::make('cluster_id')
                //                 ->required()
                //                 ->relationship('cluster', 'nama'),
                //             Forms\Components\Select::make('kampus_id')
                //                 ->required()
                //                 ->relationship('kampus', 'nama'),
                //             Forms\Components\Select::make('jurusan_id')
                //                 ->required()
                //                 ->relationship('jurusan', 'nama'),
                //             Forms\Components\Select::make('user_id')
                //                 ->required()
                //                 ->relationship('user', 'name'),
                //             Forms\Components\TextInput::make('no_registrasi')
                //                 ->required()
                //                 ->maxLength(255),
                //         ]),
                // ]),
                // use Filament\Forms\Components\Wizard;

                Wizard::make([
                    Wizard\Step::make('Profil')
                        ->schema([
                            Forms\Components\TextInput::make('Nama')
                                ->required(),
                            Forms\Components\TextInput::make('Tempat Lahir')
                                ->required(),
                            Forms\Components\DatePicker::make('tanggal_lahir')
                                ->required(),
                            Forms\Components\TextInput::make('No Handphone')
                                ->required(),
                            Forms\Components\TextInput::make('No Handphone yang dapat dihubungi')
                                ->required(),
                            Forms\Components\Select::make('jurusan_id')
                                ->required()
                                ->relationship('jurusan', 'nama'),
                        ]),
                    Wizard\Step::make('Pendaftaran')
                        ->schema([
                            Forms\Components\Select::make('cluster_id')
                                ->required()
                                ->relationship('cluster', 'nama'),
                            Forms\Components\Select::make('kampus_id')
                                ->required()
                                ->relationship('kampus', 'nama'),
                            Forms\Components\Select::make('jurusan_id')
                                ->required()
                                ->relationship('jurusan', 'nama'),
                            Forms\Components\Select::make('user_id')
                                ->required()
                                ->relationship('user', 'name'),
                            Forms\Components\TextInput::make('no_registrasi')
                                ->required()
                                ->maxLength(255),
                        ]),
                ]),
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
