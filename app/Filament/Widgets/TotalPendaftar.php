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
    protected int | string | array $columnSpan = 'full';

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
                    ->label('Kampus'),
                TextColumn::make('pendaftaran_count')
                    ->label('Total Pendaftar')
                    
            ])
            ->paginated(false);
    }
}
