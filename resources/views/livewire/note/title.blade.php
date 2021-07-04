<div class="w-full flex items-center space-x-3">
    @if(! $editing)
        <h2 class="w-full flex-grow font-semibold text-xl text-gray-800 leading-tight" title="Edit title">
            {{ $title }}
        </h2>
        <div wire:poll.20s class="text-gray-700 flex items-center text-xs whitespace-nowrap">
            Saved {{ $note->updated_at->diffForHumans() }}
        </div>
        <button type="button" wire:click="$toggle('editing')" class="opacity-70 hover:opacity-100 transition-opacity duration-300" title="Edit title">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        </button>
        @livewire('note.share', ['note' => $note])
        @livewire('note.delete', ['note' => $note])
    @else
        <x-jet-input type="text" class="flex-grow" wire:model.lazy="title" />
        <x-jet-danger-button wire:click="cancel">Cancel</x-jet-danger-button>
        <x-jet-button wire:click="save">Save</x-jet-button>
    @endif
</div>
