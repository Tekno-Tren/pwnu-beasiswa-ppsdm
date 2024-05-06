<?php

namespace App\Filament\Resources\JalurTesResource\Pages;

use App\Filament\Resources\JalurTesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJalurTes extends ListRecords
{
    protected static string $resource = JalurTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
