<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sekolah;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SekolahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SekolahResource\RelationManagers;

class SekolahResource extends Resource
{
    protected static ?string $model = Sekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office',
        $navigationLabel = 'Sekolah',
        $navigationGroup = 'Data Master';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('npsn')
                        ->label('NPSN')
                        ->required()
                        ->placeholder('Masukkan NPSN sekolah'),
                    TextInput::make('nama')
                        ->label('Nama Sekolah')
                        ->required()
                        ->placeholder('Masukkan nama sekolah'),
                    TextInput::make('alamat')
                        ->label('Alamat')
                        ->required()
                        ->placeholder('Masukkan alamat sekolah'),
                    TextInput::make('no_hp')
                        ->label('Nomor Telepon')
                        ->required()
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('npsn')
                    ->searchable()
                    ->label('NPSN'),
                TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Sekolah'),
                TextColumn::make('alamat')
                    ->searchable()
                    ->label('Alamat'),
                TextColumn::make('no_hp')
                    ->searchable()
                    ->label('Nomor Telepon'),
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
            'index' => Pages\ListSekolahs::route('/'),
            'create' => Pages\CreateSekolah::route('/create'),
            'edit' => Pages\EditSekolah::route('/{record}/edit'),
        ];
    }
}
