<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Imports\PenilaianImporter;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PenilaianResource;
use EightyNine\ExcelImport\ExcelImportAction;

class ListPenilaians extends ListRecords
{
    protected static string $resource = PenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make('Import Penilaian')
                ->slideOver()
                ->color("primary"),
            Actions\CreateAction::make('Tambah Penilaian')
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
