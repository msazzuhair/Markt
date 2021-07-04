<div class="w-full">
    <div class="w-full p-3 prose max-w-none" wire:ignore>
{{--        <x-easy-mde name="contents">{{ $contents }}</x-easy-mde>--}}
        <textarea
            name="editor"
            id="editor"
        >{{ $contents }}</textarea>
    </div>

    @push('scripts')
        <script>
            var editor = new EasyMDE({
                forceSync: true,
            });

            editor.codemirror.on("change", function () {
                let timer;
                clearTimeout(timer);
                timer = setTimeout(@this.modifyContents(editor.value()), 3000);
            });
        </script>
    @endpush
</div>
