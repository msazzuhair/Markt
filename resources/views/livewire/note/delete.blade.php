<div class="flex items-center">
    <button type="button" wire:click="confirmNoteDeletion" class="opacity-70 hover:opacity-100 hover:text-red-600 transition-all duration-300" title="Delete this note">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
    </button>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingNoteDeletion">
            <x-slot name="title">
                {{ __('Delete Note') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this note?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingNoteDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteNote" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
    </x-jet-dialog-modal>
</div>
