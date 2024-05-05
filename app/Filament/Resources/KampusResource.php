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

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Kampus';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 7;

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
                Forms\Components\Select::make('id_cluster_kampus')
                    ->label('Cluster Kampus')
                    ->relationship('cluster_kampus', 'nama')
                    ->placeholder('Pilih Cluster Kampus')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kode')
                    ->label('No Kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cluster_kampus.nama')
                    ->label('Cluster Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
