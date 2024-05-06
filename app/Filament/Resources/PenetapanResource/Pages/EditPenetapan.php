<?php

namespace App\Filament\Resources\PenetapanResource\Pages;

use App\Filament\Resources\PenetapanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenetapan extends EditRecord
{
    protected static string $resource = PenetapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
