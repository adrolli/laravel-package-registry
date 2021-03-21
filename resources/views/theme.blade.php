<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <link rel="stylesheet" href="colorextract/screen.css">
        <link rel="stylesheet" href="colorextract/dropzone/min/basic.min.css">
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        <!-- link rel="stylesheet" href="colorextract/dropzone/min/dropzone.min.css" -->

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body>
        <div class="font-sans antialiased text-gray-900">

        <!-- form wire:submit.prevent="save" action="colorextract/upload.php" class="dropzone" id="logo"></form -->



        <!-- livewire:theme-maker /-->

        <x-file-pond />


        </div>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

        @livewireScripts

    </body>
</html>
