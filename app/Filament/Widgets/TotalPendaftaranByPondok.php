<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use App\Models\Pondok;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class TotalPendaftaranByPondok extends BaseWidget
{
    protected static ?string $label = 'Total Pendaftar By Pondok';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pondok::query()
                    ->whereHas('users')
                    ->withCount([
                        'users' => fn (Builder $query) => $query->whereHas('pendaftaran')
                    ])
            )
            ->columns([
                TextColumn::make('nama')
                    ->label('Pondok')
                    ->width('75%')
                    ->sortable(),
                TextColumn::make('users_count')
                    ->label('Total Pendaftar')
                    ->sortable()
            ])
            ->defaultSort('users_count', 'desc');
    }
}
