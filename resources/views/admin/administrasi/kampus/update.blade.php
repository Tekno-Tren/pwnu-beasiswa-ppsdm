<?php

use App\Livewire\Forms\KampusForm;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Kampus;

new #[Layout('layouts.app-admin')] class extends Component
{
    public KampusForm $form;

    public function mount(Kampus $kampus)
    {
        $this->form->setKampus($kampus);
    }

    public function updateKampus(): void
    {
        $this->validate();

        $this->form->update();

        $this->redirectIntended(default: route('admin.administrasi.kampus.index', absolute: false), navigate: true);
    }
};
?>

<x-app-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrasi Kampus') }}
        </h2>
    </x-slot>

    <form wire:submit="updateKampus">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <div class="my-3">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200 leading-tight">
                            {{ __('Perbarui Data Kampus') }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 leading-tight">
                            {{ __('Perbarui data kampus yang ada') }}
                        </p>
                    </div>
                    <div class="my-3">
                        {{-- <a href="{{ route('admin.administrasi.kampus.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 dark:active:bg-indigo-600 transition ease-in-out duration-150">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{ __('Submit') }}
                        </a> --}}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Nama Kampus -->
                        <div>
                            <x-input-label for="nama" :value="__('Nama Kampus')" />
                            <x-text-input wire:model="form.nama" id="nama" class="block mt-1 w-full" type="text" name="nama" required autofocus autocomplete="nama" />
                            <x-input-error :messages="$errors->get('form.nama')" class="mt-2" />
                        </div>

                        <!-- Alamat Kampus -->
                        <div class="mt-4">
                            <x-input-label for="alamat" :value="__('Alamat Kampus')" />
                            <x-text-input wire:model="form.alamat" id="alamat" class="block mt-1 w-full" type="text" name="alamat" required autocomplete="alamat" />
                            <x-input-error :messages="$errors->get('form.alamat')" class="mt-2" />
                        </div>

                        <!-- Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-admin-layout>
