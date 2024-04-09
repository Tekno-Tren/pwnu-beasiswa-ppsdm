<?php

namespace App\Filament\Resources\ClusterBeasiswaResource\Pages;

use App\Filament\Resources\ClusterBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClusterBeasiswas extends ListRecords
{
    protected static string $resource = ClusterBeasiswaResource::class;
    protected static ?string $title = 'Cluster Beasiswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
