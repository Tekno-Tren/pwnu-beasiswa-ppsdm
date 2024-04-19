<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KampusResource\Pages;
use App\Filament\Resources\KampusResource\RelationManagers;
use App\Models\Kampus;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KampusResource extends Resource
{
    protected static ?string $model = Kampus::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern',
        $navigationLabel = 'Kampus',
        $navigationGroup = 'Data Master';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_kode')
                    ->required()
                    ->label('No Kode Kampus')
                    ->placeholder('Masukkan No Kode Perguruan Tinggi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Kampus')
                    ->placeholder('Masukkan Nama Kampus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->label('Alamat Kampus')
                    ->placeholder('Masukkan Alamat Kampus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->label('No HP Kampus')
                    ->placeholder('Masukkan No HP Kampus')
                    ->maxLength(255),
                Forms\Components\Select::make('cluster_id')
                    ->label('Cluster Beasiswa')
                    ->relationship('cluster', 'nama')
                    ->placeholder('Pilih Cluster Beasiswa')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kode')
                    ->label('No Kode Perguruan Tinggi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No HP Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cluster.nama')
                    ->label('Cluster Beasiswa')
                    ->searchable(),
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
            'index' => Pages\ListKampus::route('/'),
            'create' => Pages\CreateKampus::route('/create'),
            'edit' => Pages\EditKampus::route('/{record}/edit'),
        ];
    }
}
