<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalurPrestasiResource\Pages;
use App\Filament\Resources\JalurPrestasiResource\RelationManagers;
use App\Models\JalurPrestasi;
use App\Models\ClusterBeasiswa;
use App\Models\Jurusan;
use App\Models\Fakultas;
use App\Models\Kampus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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
                Forms\Components\Select::make('kampus_id')
                    ->relationship(name:'kampus', titleAttribute: 'nama')
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('fakultas_id', null);
                        $set('jurusan_id', null);
                    })
                    ->required(),
                Forms\Components\Select::make('fakultas_id')
                    ->options(fn (Get $get): Collection => Fakultas::query()
                        ->where('kampus_id', $get('kampus_id'))
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('jurusan_id', null))
                    ->required(),
                Forms\Components\Select::make('jurusan_id')
                    ->options(fn (Get $get): Collection => Jurusan::query()
                        ->where('fakultas_id', $get('fakultas_id'))
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live()
                    ->required(),
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
