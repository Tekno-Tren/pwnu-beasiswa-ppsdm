<?php

namespace App\Filament\Resources\ClusterKampusResource\Pages;

use App\Filament\Resources\ClusterKampusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClusterKampus extends EditRecord
{
    protected static string $resource = ClusterKampusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
