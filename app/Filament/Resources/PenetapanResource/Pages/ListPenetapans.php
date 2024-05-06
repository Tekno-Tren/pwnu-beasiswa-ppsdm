<?php

namespace App\Filament\Resources\PenetapanResource\Pages;

use App\Filament\Resources\PenetapanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenetapans extends ListRecords
{
    protected static string $resource = PenetapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
