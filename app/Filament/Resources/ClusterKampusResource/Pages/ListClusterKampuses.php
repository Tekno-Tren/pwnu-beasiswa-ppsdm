<?php

namespace App\Filament\Resources\ClusterKampusResource\Pages;

use App\Filament\Resources\ClusterKampusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClusterKampuses extends ListRecords
{
    protected static string $resource = ClusterKampusResource::class;
    protected static ?string $title = 'Cluster Beasiswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
