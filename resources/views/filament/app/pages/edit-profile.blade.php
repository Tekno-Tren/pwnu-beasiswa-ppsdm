<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->editGeneralProfileForm }}
        <x-filament-panels::form.actions
            :actions="$this->getUpdateProfileFormActions()"
        />
    </x-filament-panels::form>
    <x-filament-panels::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}
        <x-filament-panels::form.actions
            :actions="$this->getUpdatePasswordFormActions()"
        />
    </x-filament-panels::form>
</x-filament-panels::page>
