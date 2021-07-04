<x-editor-layout>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between space-x-5">
            @livewire('note.title', ['note' => $note])
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('note.editor', ['note' => $note])
            </div>
        </div>
    </div>
</x-editor-layout>
