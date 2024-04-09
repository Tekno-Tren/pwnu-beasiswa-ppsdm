<?php

namespace App\Filament\Resources\ClusterBeasiswaResource\Pages;

use App\Filament\Resources\ClusterBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClusterBeasiswa extends EditRecord
{
    protected static string $resource = ClusterBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
