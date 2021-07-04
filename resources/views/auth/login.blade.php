<x-auth-layout>
    <x-slot name="title">Sign In</x-slot>
    <x-jet-validation-errors class="mb-4" />
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="relative w-full mb-3">
                <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    for="email"
                >Email/Username</label
                ><input
                    id="email"
                    type="text"
                    name="email"
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    placeholder="Email/Username"
                    style="transition: all 0.15s ease 0s;"
                    value="{{ old('email') }}"
                    autofocus
                    required
                />
            </div>
            <div class="relative w-full mb-3">
                <label
                    class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    for="password"
                >Password</label
                ><input
                    id="password"
                    type="password"
                    name="password"
                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    placeholder="Password"
                    style="transition: all 0.15s ease 0s;"
                    required
                />
            </div>
            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <input
                        id="customCheckLogin"
                        type="checkbox"
                        name="remember"
                        class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                        style="transition: all 0.15s ease 0s;"
                    />
                    <span class="ml-2 text-sm font-semibold text-gray-700">
                        Remember me
                    </span>
                </label>
            </div>
            <div class="text-center mt-6">
                <button
                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                    type="submit"
                    style="transition: all 0.15s ease 0s;"
                >
                    Sign In
                </button>
            </div>
    </form>
</x-auth-layout>
