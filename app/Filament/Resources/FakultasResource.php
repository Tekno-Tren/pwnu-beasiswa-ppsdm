<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FakultasResource\Pages;
use App\Filament\Resources\FakultasResource\RelationManagers;
use App\Models\Fakultas;
use App\Models\Kampus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FakultasResource extends Resource
{
    protected static ?string $model = Fakultas::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Fakultas';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Fakultas')
                    ->maxLength(255),
                Forms\Components\Select::make('id_kampus')
                    ->required()
                    ->relationship('kampus', 'nama')
                    ->label('Nama Kampus')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Fakultas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kampus.nama')
                    ->label('Nama Kampus')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
            'index' => Pages\ListFakultas::route('/'),
            'create' => Pages\CreateFakultas::route('/create'),
            'edit' => Pages\EditFakultas::route('/{record}/edit'),
        ];
    }
}
