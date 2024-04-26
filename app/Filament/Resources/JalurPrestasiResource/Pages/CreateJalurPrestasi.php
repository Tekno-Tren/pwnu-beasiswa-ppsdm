<?php

namespace App\Filament\Resources\JalurPrestasiResource\Pages;

use App\Filament\Resources\JalurPrestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJalurPrestasi extends CreateRecord
{
    protected static string $resource = JalurPrestasiResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
