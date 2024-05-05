<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClusterKampusResource\Pages;
use App\Filament\Resources\ClusterKampusResource\RelationManagers;
use App\Models\ClusterKampus;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\EditAction;

class ClusterKampusResource extends Resource
{
    protected static ?string $model = ClusterKampus::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationLabel = 'Cluster Beasiswa';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Cluster')
                    ->required()
                    ->placeholder('Masukkan nama cluster'),
                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->placeholder('Masukkan deskripsi cluster'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Cluster'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable()
                    ->label('Deskripsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListClusterKampuses::route('/'),
            'create' => Pages\CreateClusterKampus::route('/create'),
            'edit' => Pages\EditClusterKampus::route('/{record}/edit'),
        ];
    }
}
