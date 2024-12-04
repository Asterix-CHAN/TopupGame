<div>
    <x-secondary-button  wire:click="alertConfirm">Success</x-secondary-button>
    <x-secondary-button x-on:click="$dispatch('confirm-alert')">Confirm</x-secondary-button>

    <x-confirm-delete/>

    <x-success-alert/>
</div>
