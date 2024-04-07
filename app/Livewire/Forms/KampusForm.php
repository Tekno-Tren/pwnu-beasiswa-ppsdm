<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Kampus;

class KampusForm extends Form
{
    public ?Kampus $kampus;

    #[Validate('required|string')]
    public string $nama = '';

    #[Validate('required|string')]
    public string $alamat = '';

    public function setKampus(Kampus $kampus)
    {
        $this->kampus = $kampus;
        $this->nama = $kampus->nama;
        $this->alamat = $kampus->alamat;
    }

    public function store(): void
    {
        $this->validate();

        Kampus::create($this->only(['nama', 'alamat']));

        session()->flash('message', 'Kampus berhasil ditambahkan.');

        $this->reset();
    }

    public function update(Kampus $kampus): void
    {
        $this->validate();

        $kampus->update($this->all());

        $this->reset();
    }
}
