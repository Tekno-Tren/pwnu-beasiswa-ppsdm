<?php

namespace App\Filament\Resources\ClusterKampusResource\Pages;

use App\Filament\Resources\ClusterKampusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClusterKampus extends CreateRecord
{
    protected static string $resource = ClusterKampusResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
