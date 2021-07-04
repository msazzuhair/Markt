<div class="flex items-center">
    <button type="button" wire:click="confirmNoteSharing" class="opacity-70 hover:opacity-100 transition-opacity duration-300" title="Share this note">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
    </button>

    <x-jet-dialog-modal wire:model="confirmingNoteSharing">
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <div>{{ __('Share Note') }}</div>
                <div class="text-sm {{ $note->shared ? 'text-green-700' : 'text-red-500' }}">
                    {{ $note->shared ? 'Shared' : 'Not shared' }}
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('You can share this note (read-only) using the link below. You can also set a password to share the note privately.') }}

            <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <div class="flex items-center mb-4" x-data="{ copied: false }">
                    <x-jet-input type="text" class="mt-1 block w-3/4 bg-gray-100"
                                 x-ref="url"
                                 value="{{ route('note.read', ['note' => $note->uuid]) }}"
                                 readonly />
                    <button
                        type="button"
                        class="ml-3 opacity-70 hover:opacity-100 transition-opacity"
                        x-on:click="$refs.url.select(); $refs.url.setSelectionRange(0, 99999); document.execCommand('copy'); copied = true; setTimeout(() => copied = false, 3000)"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </button>
                    <div x-show="copied" x-transition class="ml-2 text-sm">Copied!</div>
                </div>
                <div class="flex items-center mb-4" x-data="{ copied: false }">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                 placeholder="{{ __('New Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="shareNote" />

                    <x-jet-input-error for="password" class="mt-2" />
                    <div x-data="{ text: '' }" x-on:password-reset.window="text = 'Password cleared.'; setTimeout(() => text = '', 3000)" class="ml-2 text-sm" x-text="text"></div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingNoteSharing')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if($note->shared)
                <x-jet-danger-button class="ml-2" wire:click="disableSharing" wire:loading.attr="disabled">
                    {{ __('Disable Sharing') }}
                </x-jet-danger-button>
            @endif

            @if(isset($note->password))
                <x-jet-danger-button class="ml-2" wire:click="removePassword" wire:loading.attr="disabled">
                    {{ __('Reset Password') }}
                </x-jet-danger-button>
            @endif

            <x-jet-button class="ml-2" wire:click="shareNote" wire:loading.attr="disabled">
                {{ __('Share Note') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
