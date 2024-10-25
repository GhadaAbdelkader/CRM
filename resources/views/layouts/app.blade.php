<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        @livewireStyles
{{--        <x-head.tinymce-config/>--}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <div class="flex ">
                <div id="sidebar" class="w-64 transition-width duration-300">
                    @livewire('sidebar')
                </div>
            <!-- Page Heading -->
                <div  id="content"  class="flex-1 flex flex-col  transition-margin duration-300 ease-in-out">


                    <livewire:layout.navigation />


                    <main class="mt-2">
                        {{ $slot }}
                    </main>
                </div>
            </div>

            <!-- Page Content -->

        </div>
        @livewireScripts
        <script>
            Livewire.on('sidebarToggled', function(isOpenArray) {
                const isOpen = isOpenArray[0];

                const content = document.getElementById('content');

                if (isOpen) {
                    content.style.marginLeft = '0rem'; // Sidebar open

                } else {
                    content.style.marginLeft = '-12rem'; // Sidebar open

                }
            });

        </script>
    </body>
</html>
