<?php

namespace App\Livewire\Administrasi;

use Livewire\Component;
use App\Livewire\Forms\KampusForm;

class CreateKampus extends Component
{
    public KampusForm $form;

    public function save(): void
    {
        $this->validate();

        $this->form->store();

        $this->redirectIntended(default: route('admin.administrasi.kampus.index', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.administrasi.create-kampus');
    }
}
