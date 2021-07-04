<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo.svg') }}" type="image/x-icon">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    />
</head>
<body class="text-gray-800 antialiased">
<div
    class="min-h-screen w-full bg-gray-900 flex flex-col bg-bottom md:bg-top"
    style="background-image: url({{ asset('storage/auth_bg.png') }}); background-size: 100%; background-repeat: no-repeat;"
>
    <nav
        class="z-50 w-full flex flex-wrap items-center justify-between px-2 py-3"
    >
        <div
            class="container px-4 mx-auto flex flex-wrap items-center justify-between"
        >
            <div
                class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
            >
                <a
                    class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="{{ url('') }}"
                >{{ config('app.name', 'Laravel') }}</a
                ><button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"
                    onclick="toggleNavbar('example-collapse-navbar')"
                >
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div
                class="lg:flex flex-grow items-center bg-gray-800 rounded-md lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar"
            >
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                    <li class="flex items-center justify-center">
                        <a
                            class="lg:text-white lg:hover:text-gray-100 text-gray-300 px-3 py-4 lg:py-2 flex items-center text-xs"
                            href="https://facebook.com/muhammad.azzuhair"
                        >
                            <i
                                class="text-gray-300 fab fa-facebook text-lg leading-lg hover:text-blue-500 transition-colors duration-300"
                            ></i>
                            <span class="lg:hidden inline-block ml-2">Facebook</span>
                        </a>
                    </li>
                    <li class="flex items-center justify-center">
                        <a
                            class="lg:text-white lg:hover:text-gray-100 text-gray-300 px-3 py-4 lg:py-2 flex items-center text-xs"
                            href="https://twitter.com/msazzuhair"
                        ><i
                                class="text-gray-300 fab fa-twitter text-lg leading-lg hover:text-sky-500 transition-colors"
                            ></i
                            ><span class="lg:hidden inline-block ml-2">Twitter</span></a
                        >
                    </li>
                    <li class="flex items-center justify-center">
                        <a
                            class="lg:text-white lg:hover:text-gray-100 text-gray-300 px-3 py-4 lg:py-2 flex items-center text-xs"
                            href="https://github.com/msazzuhair"
                        ><i
                                class="text-gray-300 fab fa-github text-lg leading-lg hover:text-white transition-colors"
                            ></i
                            ><span class="lg:hidden inline-block ml-2">Github</span></a
                        >
                    </li>
                    <li class="flex items-center mt-2 px-3">
                        <a
                            class="w-full lg:w-auto bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 mb-3"
                            href="{{ route('login') }}"
                            style="transition: all 0.15s ease 0s;"
                        >
                            <i class="fas fa-sign-in-alt"></i> Sign in
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="pt-8 flex-grow flex">
        <section class="w-full min-h-full flex flex-col">
            <div class="container mx-auto px-4 flex-grow">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full md:1/2 lg:w-1/3 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
                        >
                            <div class="rounded-t mb-0 px-6 py-6">
                                @if (JoelButcher\Socialstream\Socialstream::show())
                                    <x-socialstream-providers />
                                @endif
                            </div>
                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <div class="text-gray-500 text-center mb-3 font-bold">
                                    @if (request()->routeIs('login'))
                                        @if (JoelButcher\Socialstream\Socialstream::show())
                                            <small>Or sign in with credentials</small>
                                        @else
                                            <small>Sign in with credentials</small>
                                        @endif
                                    @else
                                        @if (JoelButcher\Socialstream\Socialstream::show())
                                            <small>Or create a new account</small>
                                        @else
                                            <small>Create a new account</small>
                                        @endif
                                    @endif
                                </div>

                                {{ $slot }}
                            </div>
                        </div>
                        @if(request()->routeIs('login'))
                            <div class="flex flex-wrap mt-6 px-5 py-3 lg:p-0 bg-gray-800 lg:bg-transparent rounded-md">
                                <div class="w-1/2">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-gray-300 hover:underline focus:underline"
                                        ><small>Forgot password?</small></a
                                        >
                                    @endif
                                </div>
                                <div class="w-1/2 text-right">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-gray-300 hover:underline focus:underline"
                                        ><small>Create new account</small></a
                                        >
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if(request()->routeIs('register'))
                            <div class="mt-6 w-full text-center px-5 py-3 lg:p-0 bg-gray-800 lg:bg-transparent rounded-md">
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-gray-300 hover:underline focus:underline"
                                    ><small>Sign in with credentials</small></a
                                    >
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <footer class="mt-8 w-full bg-gray-900 pb-6">
                <div class="container mx-auto px-4">
                    <hr class="mb-6 border-b-1 border-gray-700" />
                    <div
                        class="flex flex-wrap items-center justify-center md:justify-between "
                    >
                        <div class="w-full md:w-4/12 px-4 text-center md:text-left">
                            <div class="text-sm text-white font-semibold py-1">
                                Copyright © {{ date('Y') }}
                                <a
                                    href="https://maqwa.com"
                                    class="text-white hover:text-gray-400 text-sm font-semibold py-1"
                                >Muhammad Az Zuhair</a
                                >
                            </div>
                        </div>
                        <div class="w-full md:w-8/12 px-4">
                            <ul
                                class="flex flex-wrap list-none md:justify-end  justify-center"
                            >
                                <li>
                                    <a
                                        href="https://maqwa.com"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                                    >Maqwa Studio</a
                                    >
                                </li>
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <li>
                                        <a
                                            href="{{ route('terms.show') }}"
                                            class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                                        >Terms of Service</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('policy.show') }}"
                                            class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                                        >Privacy Policy</a
                                        >
                                    </li>
                                @endif
                                <li>
                                    <a
                                        href="https://github.com/msazzuhair/liveresearch/blob/main/LICENSE"
                                        class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                                    >MIT License</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
</div>
</body>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>
</html>
