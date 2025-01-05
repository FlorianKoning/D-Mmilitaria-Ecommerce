<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="{{ $functions::requestUriCheck('/cms', 'font-robotoMono', 'font-sans') }} antialiased {{ $functions::requestUriCheck('/cms', 'bg-cmsBackground', 'bg-background') }} ">
        @if (str_contains($_SERVER['REQUEST_URI'], '/cms'))
            @include('layouts.cms.navigation')

                <main class="py-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <!-- Your content -->
                    </div>
                    </main>
                </div>
            </div>
        @else
            <div class="h-full mt-16">
                @include('layouts.navigation')
                <!-- Page Content -->
                <main>
                    <x-banner />
                    {{ $slot }}
                </main>
            </div>
        @endif
    </body>
</html>
