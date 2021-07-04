<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
    <a
        href="{{ route('note.create') }}"
        class="w-full py-6 px-3 flex flex-col items-center justify-center space-y-3 bg-white opacity-70 border border-gray-300 hover:opacity-100 focus:opacity-100 focus:outline-none active:bg-gray-200 transition-all duration-300 text-gray-600 rounded-md shadow-md"
    >
        <div>
            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        </div>
        <div>Create a note</div>
    </a>

    @foreach(Auth::user()->notes()->orderBy('updated_at', 'desc')->get() as $note)
        <a
            href="{{ $note->show_link }}"
            class="w-full flex flex-col items-center justify-center bg-white opacity-70 border border-gray-300 hover:opacity-100 focus:opacity-100 focus:outline-none active:bg-gray-200 transition-all duration-300 text-gray-600 rounded-md shadow-md"
        >
            <div class="py-10 px-3 flex items-center">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div class="w-full overflow-hidden py-4 px-6 bg-gray-200 text-gray-700">
                <div class="overflow-hidden truncate font-semibold">
                    {{ $note->title }}
                </div>
                <div class="text-sm" title="Date updated">{{ $note->updated_at->toDayDateTimeString() }}</div>
            </div>
        </a>
    @endforeach
</div>
