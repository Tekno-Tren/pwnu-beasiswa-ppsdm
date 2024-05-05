<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalurPrestasiResource\Pages;
use App\Filament\Resources\JalurPrestasiResource\RelationManagers;
use App\Models\JalurPrestasi;
use App\Models\ClusterBeasiswa;
use App\Models\Jurusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JalurPrestasiResource extends Resource
{
    protected static ?string $model = JalurPrestasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Jalur Prestasi';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('cluster_id')
                    ->required()
                    ->options(ClusterBeasiswa::all()->pluck('nama', 'id')),
                Forms\Components\Select::make('jurusan_id')
                    ->required()
                    ->searchable()
                    ->options(Jurusan::all()->pluck('nama', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
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
            'index' => Pages\ListJalurPrestasis::route('/'),
            'create' => Pages\CreateJalurPrestasi::route('/create'),
            'edit' => Pages\EditJalurPrestasi::route('/{record}/edit'),
        ];
    }
}
