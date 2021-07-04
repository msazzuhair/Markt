<div>
    @if ($unlocked)
        @if (! empty($note->contents))
            <div class="min-h-full bg-white shadow-xl sm:rounded-lg prose max-w-none p-8">
                @markdown($note->contents)
            </div>
        @else
            <div class="min-h-full sm:rounded-lg p-8 text-center text-xl text-gray-700">
                This note is empty
            </div>
        @endif
    @else
        <div class="flex flex-col justify-center items-center min-h-full sm:rounded-lg p-8 text-center">
            <x-jet-label for="password" value="Enter note password "/>
            <div class="my-3 flex items-center justify-center space-x-3 ">
                <x-jet-input id="password" type="password" wire:keydown.enter="unlock" wire:model="password" placeholder="Note Password" />
                <x-jet-button type="button" wire:click="unlock">Unlock</x-jet-button>
            </div>
            <x-jet-validation-errors for="password" class="w-48" />
        </div>
    @endif
</div>
