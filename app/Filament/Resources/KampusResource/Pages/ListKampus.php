<?php

namespace App\Filament\Resources\KampusResource\Pages;

use App\Filament\Resources\KampusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKampus extends ListRecords
{
    protected static string $resource = KampusResource::class;
    protected static ?string $title = 'Kampus';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
