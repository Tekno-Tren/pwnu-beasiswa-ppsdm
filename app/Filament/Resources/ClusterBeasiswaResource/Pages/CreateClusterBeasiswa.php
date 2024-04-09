<?php

namespace App\Filament\Resources\ClusterBeasiswaResource\Pages;

use App\Filament\Resources\ClusterBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClusterBeasiswa extends CreateRecord
{
    protected static string $resource = ClusterBeasiswaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
