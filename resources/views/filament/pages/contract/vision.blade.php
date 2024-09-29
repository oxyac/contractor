<x-filament-panels::page>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="photos" multiple>

        @error('photos.*') <span class="error">{{ $message }}</span> @enderror

        <x-filament::button type="submit">Save Photo</x-filament::button>
    </form>
</x-filament-panels::page>
