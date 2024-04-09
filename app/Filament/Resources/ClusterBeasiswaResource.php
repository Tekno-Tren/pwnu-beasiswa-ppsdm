<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClusterBeasiswaResource\Pages;
use App\Filament\Resources\ClusterBeasiswaResource\RelationManagers;
use App\Models\ClusterBeasiswa;
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

class ClusterBeasiswaResource extends Resource
{
    protected static ?string $model = ClusterBeasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack',
        $navigationLabel = 'Cluster Beasiswa',
        $navigationGroup = 'Data Master';
    protected static ?int $navigationSort = 6;

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
            'index' => Pages\ListClusterBeasiswas::route('/'),
            'create' => Pages\CreateClusterBeasiswa::route('/create'),
            'edit' => Pages\EditClusterBeasiswa::route('/{record}/edit'),
        ];
    }
}
