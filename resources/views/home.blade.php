<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="bg-black font-sans">
        

        <div id="app">
        </div>

        {{-- Load the application scripts
        @if (env('APP_ENV') === 'local')
            <script src="{{ mix('/js/app.js') }}"></script>
        @else
        --}}
            <script src="{{ mix('/js/manifest.js') }}"></script>
            <script src="{{ mix('/js/vendor.js') }}"></script>
            <script src="{{ mix('/js/app.js') }}"></script><tab>
        {{-- @endif --}}
    </body>
</html>
