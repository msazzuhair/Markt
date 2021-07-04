@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="mt-3 list-none bg-red-500 text-red-50 font-normal p-4 rounded outline-none focus:outline-none mr-2 mb-1 shadow-md flex flex-col justify-center items-center font-bold text-sm">
            @foreach ($errors->all() as $error)
                <li class="text-center">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
