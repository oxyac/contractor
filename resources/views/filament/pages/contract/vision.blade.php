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
        <input type="file" wire:model="photos" multiple>

        @error('photos.*') <span class="error">{{ $message }}</span> @enderror

        <br/>
        <br/>
        <x-filament::button type="submit">Parse contract</x-filament::button>
    </form>
</x-filament-panels::page>
