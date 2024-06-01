<?php

namespace App\Filament\Widgets;

use App\Models\Kampus;
use App\Models\Pendaftaran;
use Filament\Widgets\ChartWidget;

class totalPendaftarann2 extends ChartWidget
{
    protected static ?string $heading = 'Total Pendaftar';
    protected int | string | array $columnSpan = 'full';


    protected function getData(): array
    {
        $kampus = Kampus::query()
            ->withCount('pendaftaran')
            ->having('pendaftaran_count', '>', 0)
            ->get();
        $kampus_nama = $kampus->pluck('nama');
        $kampus_nama = $kampus_nama->toArray();

        $kampus_pendaftaran = $kampus->pluck('pendaftaran_count');
        $kampus_pendaftaran = $kampus_pendaftaran->toArray();

        $color = [];
        foreach ($kampus_nama as $key => $value) {
            $color[] = 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
        }

        return [
            'labels' => $kampus_nama,
            'datasets' => [
                [
                    'label' => 'Total Pendaftar',
                    'data' => $kampus_pendaftaran,
                    'backgroundColor' => $color,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
