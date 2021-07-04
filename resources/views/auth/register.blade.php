<x-auth-layout>
    <x-slot name="title">Register</x-slot>
    <x-jet-validation-errors class="mb-4" />
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="relative w-full mb-3">
            <label
                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="username"
            >Username</label
            ><input
                id="username"
                type="text"
                name="username"
                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                placeholder="Username"
                style="transition: all 0.15s ease 0s;"
                value="{{ old('username') }}"
                autofocus
                required
                autocomplete="username"
            />
        </div>
        <div class="relative w-full mb-3">
            <label
                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="name"
            >Name</label
            ><input
                id="name"
                type="text"
                name="name"
                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                placeholder="Name"
                style="transition: all 0.15s ease 0s;"
                value="{{ old('name') }}"
                required
                autocomplete="name"
            />
        </div>
        <div class="relative w-full mb-3">
            <label
                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="email"
            >Email</label
            ><input
                id="email"
                type="email"
                name="email"
                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                placeholder="Email"
                style="transition: all 0.15s ease 0s;"
                value="{{ old('email') }}"
                required
                autocomplete="email"
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
                autocomplete="new-password"
            />
        </div>
        <div class="relative w-full mb-3">
            <label
                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                for="password_confirmation"
            >Confirm Password</label
            ><input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                placeholder="Confirm Password"
                style="transition: all 0.15s ease 0s;"
                required
                autocomplete="new-password"
            />
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div>
                <label class="inline-flex items-center cursor-pointer"
                ><input
                        id="terms"
                        type="checkbox"
                        name="terms"
                        class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                        style="transition: all 0.15s ease 0s;"
                    />
                    <span class="ml-2 text-sm text-gray-700">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </span>
                </label>
            </div>
        @endif
        <div class="text-center mt-6">
            <button
                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                type="submit"
                style="transition: all 0.15s ease 0s;"
            >
                Register
            </button>
        </div>
    </form>
</x-auth-layout>
