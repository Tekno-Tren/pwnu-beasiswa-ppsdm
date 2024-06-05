<?php

namespace App\Filament\Widgets;

use App\Models\Pendaftaran;
use Filament\Widgets\StatsOverviewWidget;
use StatsOverviewWidget\Stat;

class totalPendaftarann extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            StatsOverviewWidget\Stat::make(
                label: 'Total Pendaftaran',
                value: Pendaftaran::query()
                    ->where('created_at', '>=', '2024-05-14')
                    ->count(),
            ),
        ];
    }
}
