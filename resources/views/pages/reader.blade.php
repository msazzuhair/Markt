<x-reader-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>{{ $note->title }}</div>
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="inline-flex rounded-md">
                    <div title="Author" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ $note->user->name }}
                        <img class="ml-2 -mr-0.5 h-8 w-8 rounded-full object-cover" src="{{ $note->user->profile_photo_url }}" alt="{{ $note->user->name }}" />
                    </div>
                </div>
            @else
                <div class="inline-flex rounded-md">
                    <div title="Author" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ $note->user->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('note.reader', ['note' => $note])
        </div>
    </div>
</x-reader-layout>
