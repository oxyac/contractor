<x-filament-panels::page>
    <div>
        <h1>1. Upload contract 📄</h1>
        <p>Upload the contract to parse it and extract the information.</p>
        <br/>

        <h1>2. Review and confirm ✅</h1>
        <p>Extracted information will be displayed in My Space tabs.</p>
        <br/>

        <h1>3. Generate Invoices 💸</h1>
        <p>Generate invoices for the contract.</p>
    </div>
    <form wire:submit.prevent="save">

        <div
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false, $wire.uploadFinish()"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            class="w-60"
        >
            <!-- File Input -->
            <input type="file" wire:model="document" class="w-full">

            <!-- Progress Bar -->
            <div x-show="isUploading" class="mt-4">
                <progress max="100" x-bind:value="progress"></progress>
            </div>

            @error('document') <span class="error mt-4" >{{ $message }}</span> @enderror

            <div class="pt-4">
                <x-filament::button type="submit" :disabled="$disableSubmit" >Parse contract</x-filament::button>
            </div>

        </div>


    </form>
</x-filament-panels::page>
