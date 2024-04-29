<?php

namespace App\Filament\App\Resources\MahasiswaResource\Pages;

use App\Filament\App\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswas extends ListRecords
{
    protected static string $resource = MahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
