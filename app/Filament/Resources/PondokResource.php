<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pondok;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PondokResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PondokResource\RelationManagers;

class PondokResource extends Resource
{
    protected static ?string $model = Pondok::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Pondok';
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nspp')
                        ->label('NSPP')
                        ->required()
                        ->placeholder('Masukkan NSPP pondok'),
                    TextInput::make('nama')
                        ->label('Nama Pondok')
                        ->required()
                        ->placeholder('Masukkan nama pondok'),
                    TextInput::make('alamat')
                        ->label('Alamat')
                        ->required()
                        ->placeholder('Masukkan alamat pondok'),
                    TextInput::make('kelurahan')
                        ->label('Kelurahan')
                        ->required()
                        ->placeholder('Masukkan kelurahan pondok'),
                    TextInput::make('kecamatan')
                        ->label('Kecamatan')
                        ->required()
                        ->placeholder('Masukkan kecamatan pondok'),
                    TextInput::make('kabupaten_kota')
                        ->label('Kabupaten/Kota')
                        ->required()
                        ->placeholder('Masukkan kabupaten/kota pondok'),
                    TextInput::make('provinsi')
                        ->label('Provinsi')
                        ->required()
                        ->placeholder('Masukkan provinsi pondok'),
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
                TextColumn::make('nspp')
                    ->searchable()
                    ->label('NSPP'),
                TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Pondok'),
                TextColumn::make('alamat')
                    ->searchable()
                    ->label('Alamat'),
                TextColumn::make('kelurahan')
                    ->searchable()
                    ->label('Kelurahan'),
                TextColumn::make('kecamatan')
                    ->searchable()
                    ->label('Kecamatan'),
                TextColumn::make('kabupaten_kota')
                    ->searchable()
                    ->label('Kabupaten/Kota'),
                TextColumn::make('provinsi')
                    ->searchable()
                    ->label('Provinsi'),
                TextColumn::make('no_hp')
                    ->searchable()
                    ->label('Nomor Telepon'),
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
            'index' => Pages\ListPondoks::route('/'),
            'create' => Pages\CreatePondok::route('/create'),
            'edit' => Pages\EditPondok::route('/{record}/edit'),
        ];
    }
}
