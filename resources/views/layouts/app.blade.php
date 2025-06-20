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

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        {{-- custom js files  --}}
        <script defer src="{{ asset('js/main.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/liveSearch.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/frontPage.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/checkout.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ URL::asset('js/drag-drop.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

        {{-- chartjs --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- google recaptcha --}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        {{-- CKEditor --}}
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css" />
        <script src="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.umd.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="{{ $functions::requestUriCheck('/cms', 'font-robotoMono', 'font-sans') }} antialiased {{ $functions::requestUriCheck('/cms', 'bg-[#F5F5F5]', 'bg-background') }} ">
        @if (str_contains($_SERVER['REQUEST_URI'], '/cms'))
            @include('layouts.cms.navigation')
                <main class="py-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <!-- Your content -->
                        {{ $slot }}
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

                {{-- footer --}}
                <footer class="bg-[#475353]">
                    <x-footer-content />
                </footer>
            </div>
        @endif
    </body>
</html>
