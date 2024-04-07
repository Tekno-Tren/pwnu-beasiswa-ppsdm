<x-app-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrasi Kampus') }}
        </h2>
    </x-slot>

    <livewire:administrasi.create-kampus />

</x-app-admin-layout>
