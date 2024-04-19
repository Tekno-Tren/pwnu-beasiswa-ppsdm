<?php

namespace App\Filament\Resources\JalurPrestasiResource\Pages;

use App\Filament\Resources\JalurPrestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJalurPrestasis extends ListRecords
{
    protected static string $resource = JalurPrestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
