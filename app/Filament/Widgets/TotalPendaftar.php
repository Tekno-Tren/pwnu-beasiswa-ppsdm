<?php

namespace App\Filament\Widgets;

use App\Models\Kampus;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Pendaftaran;
use Dompdf\FrameDecorator\Text;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class TotalPendaftar extends BaseWidget
{
    protected static ?string $label = 'Total Pendaftar By Kampus';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Kampus::query()
                    ->whereHas('pendaftaran')
                    ->withCount('pendaftaran')
            )
            ->columns([
                TextColumn::make('nama')
                    ->label('Kampus')
                    ->sortable()
                    ->width('75%'),
                TextColumn::make('pendaftaran_count')
                    ->label('Total Pendaftar')
                    ->sortable()
                    
            ])
            ->paginated(false)
            ->defaultSort('pendaftaran_count', 'desc');
    }
}
