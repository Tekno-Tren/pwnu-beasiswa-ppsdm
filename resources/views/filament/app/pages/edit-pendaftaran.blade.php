<x-filament-panels::page>
    @if ($this->getStatus())
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Pendaftaran Berhasil Disimpan</p>
            <p class="text-sm">Silahkan cetak Kartu Peserta Anda</p>
            <a href="{{ route('cetak-kartu', $this->getIdPendaftaran()) }}" target="_blank" class="text-sm"
                style="background-color: #4c74af; color: white; margin-top: 7px; padding: 5px 9px; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px; border: none; cursor: pointer; font-size: 13px;">Cetak</a>
        </div>

        {{-- notif/alert for reminder to Update Status Test --}}
        @if ($this->getJalurUTBK())
            <div class="bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 px-4 py-3" role="alert">
                <p class="font-bold">Apakah Lolos seleksi SNBT?</p>
                <p class="text-sm">Silahkan Update Status Test Anda</p>
                <a href="{{ route('filament.app.pages.update-status-utbk') }}" class="text-sm"
                    style="background-color: #f6e05e; color: white; margin-top: 7px; padding: 5px 9px; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px; border: none; cursor: pointer; font-size: 13px;">Update SNBT</a>
            </div>
        @endif
            
        {{-- notif/alert for reminder to Update Status Daftar Ulang --}}
        @if ($this->getStatusDaftarUlang())
        <div class="bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 px-4 py-3" role="alert">
            <p class="font-bold">Apakah Sudah Daftar Ulang?</p>
            <p class="text-sm">Silahkan Masukkan Bukti Daftar Ulang Anda</p>
            <a href="{{ route('filament.app.pages.update-status-daftar-ulang') }}" class="text-sm"
                style="background-color: #e9cb21; color: white; margin-top: 7px; padding: 5px 9px; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px; border: none; cursor: pointer; font-size: 13px;">Update Daftar Ulang</a>
        </div>
        @endif
    @endif
    <x-filament-panels::form wire:submit="save">
        {{-- Buat Pemberitahuan bahwa Pendaftaran Telah Ditutup --}}
        @if (!$this->getIdPendaftaran())
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                <p class="font-bold">Pendaftaran Telah Ditutup</p>
                <p class="text-sm">Mohon maaf, pendaftaran saat ini telah ditutup. Hubungi <a href="https://beasiswa.pwnujatim.or.id/#footer">kontak</a> untuk informasi lebih lanjut.</p>
            </div>
        @else
            <div class="mb-4">
                {{-- <h2 class="text-lg font-semibold">Formulir Pendaftaran</h2>
                <p class="text-sm text-gray-600">Silakan lengkapi formulir berikut untuk mendaftar.</p> --}}
            </div>
            {{ $this->form }}
        @endif
    </x-filament-panels::form>
</x-filament-panels::page>
