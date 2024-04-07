<?php

namespace App\Livewire\Table;

use App\Models\Kampus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class KampusTable extends DataTableComponent
{
    protected $model = Kampus::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Nama', 'nama')
                ->searchable()
                ->sortable(),
            Column::make('Alamat', 'alamat')
                ->searchable()
                ->sortable(),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    $delete = '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded m-1" wire:click="delete(' . $row->id . ')">Trash</button>';
                    $edit = '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded m-1" wire:click="edit(' . $row->id . ')">Edit</button>';
                    return $edit . $delete;
                })->html(),
        ];
    }
}
