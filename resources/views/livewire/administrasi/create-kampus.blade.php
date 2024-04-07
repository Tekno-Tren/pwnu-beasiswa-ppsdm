<form wire:submit="save">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-3">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200 leading-tight">
                    {{ __('Tambahkan Data Kampus') }}
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-tight">
                    {{ __('Masukkan data kampus yang belum tersedia') }}
                </p>
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
