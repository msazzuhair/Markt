<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo.svg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @bukStyles
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100 flex flex-col">

<!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

<!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
@bukScripts
@stack('scripts')
</body>
</html>
