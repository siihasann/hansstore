<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/b30d6eb604.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @if (Auth::check())
                @if (Auth::user()->user_role === 'admin')
                    <!-- Sidebar for Admin -->
                    <div class="flex">
                        <div class="w-64 bg-gray-800 text-gray-200 min-h-screen fixed top-0 left-0">
                            @livewire('sidebar')
                        </div>

                        <!-- Main Content for Admin -->
                        <div class="ml-64 flex-1 p-6 overflow-auto">
                            {{ $slot }}
                        </div>
                    </div>
                @else
                    <!-- Header for Customer/User -->
                    @include('layouts.navigation')

                    @if (isset($header))
                        <header class="bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content for Customer/User -->
                    <main>
                        {{ $slot }}
                    </main>
                @endif
            @else
                <!-- Tampilan untuk Tamu yang Belum Login -->
                <!-- Page Content for Guest -->
                <main>
                    {{ $slot }} <!-- Konten umum untuk tamu -->
                </main>
            @endif
        </div>
        @livewireScripts


        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('services.midtrans.clientKey')}}"></script>
    </body>
</html>
