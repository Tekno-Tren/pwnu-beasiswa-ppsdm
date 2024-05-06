<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalurPrestasiResource\Pages;
use App\Filament\Resources\JalurPrestasiResource\RelationManagers;
use App\Models\JalurPrestasi;
use App\Models\ClusterKampus;
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
                Forms\Components\Select::make('id_cluster_kampus')
                    ->required()
                    ->options(ClusterKampus::all()->pluck('nama', 'id')),
                Forms\Components\Select::make('id_kampus')
                    ->relationship(name:'kampus', titleAttribute: 'nama')
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('id_fakultas', null);
                        $set('id_jurusan', null);
                    })
                    ->required(),
                Forms\Components\Select::make('id_fakultas')
                    ->options(fn (Get $get): Collection => Fakultas::query()
                        ->where('id_kampus', $get('id_kampus'))
                        ->pluck('nama', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('id_jurusan', null))
                    ->required(),
                Forms\Components\Select::make('id_jurusan')
                    ->options(fn (Get $get): Collection => Jurusan::query()
                        ->where('id_fakultas', $get('id_fakultas'))
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
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
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
            'index' => Pages\ListJalurPrestasis::route('/'),
            'create' => Pages\CreateJalurPrestasi::route('/create'),
            'edit' => Pages\EditJalurPrestasi::route('/{record}/edit'),
        ];
    }
}
