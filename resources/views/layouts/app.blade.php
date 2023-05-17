<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @stack('scripts')
    </head>

    <body class="antialiased">
        @include('layouts.navigation')

        <main class="flex-1">
            <div class="mx-auto py-6">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
                <h1 class="text-2xl ml-24 font-semibold text-gray-700 uppercase">@yield('title')</h1>
              </div>
              <div class=" px-4 sm:px-6 lg:px-8">
                <div class="bg-white p-4 rounded-lg">
                  {{ $slot }}
                </div>
              </div>
            </div>
          </main>
        @livewire('notifications')
    </body>
</html>
