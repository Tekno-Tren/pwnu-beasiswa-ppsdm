<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\BeasiswaResource\Pages;
use App\Filament\App\Resources\BeasiswaResource\RelationManagers;
use App\Models\Beasiswa;
use App\Models\JalurPrestasi;
use App\Models\Kampus;
use App\Models\Pondok;
use App\Models\Sekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeasiswaResource extends Resource
{
    protected static ?string $beasiswa = Beasiswa::class;
    protected static ?string $kampus = Kampus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $registrationValue = 'pwnu' . time();

        return $form
            ->schema([
                Forms\Components\TextInput::make('no_registrasi')
                    ->disabled()
                    ->default($registrationValue),
                Forms\Components\Select::make('jalur_prestasi')
                    ->required()
                    ->options(JalurPrestasi::all()->pluck('nama', 'id')->toArray()),
                Forms\Components\Select::make('PTN')
                    ->required()
                    ->options(Kampus::all()->pluck('nama', 'id')->toArray())
                    ->label('PTN'),
                Forms\Components\Select::make('Pondok')
                    ->required()
                    ->options(Pondok::all()->pluck('nama', 'id')->toArray()),
                Forms\Components\Select::make('Sekolah')
                    ->required()
                    ->options(Sekolah::all()->pluck('nama', 'id')->toArray()),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeasiswas::route('/'),
            'create' => Pages\CreateBeasiswa::route('/create'),
            'edit' => Pages\EditBeasiswa::route('/{record}/edit'),
        ];
    }
}
