<x-filament-panels::page>
    @if ($this->getStatus())
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Pendaftaran Berhasil Disimpan</p>
            <p class="text-sm">Silahkan cetak Kartu Peserta Anda</p>
            <a href="{{ route('cetak-kartu', $this->getIdPendaftaran()) }}" target="_blank" class="text-sm"
                style="background-color: #4c74af;
                color: white;
                margin-top: 7px;
                padding: 5px 9px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                border-radius: 4px;
                border: none;
                cursor: pointer;
                font-size: 13px;">Cetak</a>
        </div>
    @endif
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}
    </x-filament-panels::form>
</x-filament-panels::page>
