<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\JalurPrestasi;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class TotalPendaftarByPrestasi extends BaseWidget
{
    protected static ?string $label = 'Total Pendaftar By Prestasi';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                JalurPrestasi::query()
                    ->whereHas('pendaftaran')
                    ->withCount('pendaftaran')
            )
            ->columns([
                TextColumn::make('nama')
                    ->label('Prestasi')
                    ->width('75%')
                    ->sortable(),
                TextColumn::make('pendaftaran_count')
                    ->label('Total Pendaftar')
                    ->sortable()
            ])
            ->paginated(false)
            ->defaultSort('pendaftaran_count', 'desc');
    }
}
