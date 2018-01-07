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
        <nav class="flex items-start justify-between flex-wrap bg-grey-darkest p-4">
            <div class="flex items-center flex-no-shrink text-grey mr-6">
                <i class="fab fa-steam-square text-5xl"></i>
                <span class="font-semibold text-4xl pl-2">{{ config('app.name') }}</span>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                    menu
                </button>
            </div>
            <div class="block flex-grow lg:flex lg:w-auto justify-end">
                <div class="flex-col content-end">
                    <div class="text-xl text-orange-dark pr-2">{{$user->nickname}}</div>
                    <div class="text-right mt-1">
                        <a class="btn btn-grey mr-2" href="/logout">Logout</a>
                    </div>
                </div>
                <img class="rounded-full h-12 w-12 flex items-center justify-center" src="{{$user->avatar}}"></img>
            </div>
        </nav>

        <div id="app">
            <example-component></example-componenet>
        </div>

        {{-- Load the application scripts --}}
        @if (env('APP_ENV') === 'local')
            <script src="/js/app.js"></script>
        @else
            <script src="/js/manifest.js"></script>
            <script src="/js/vendor.js"></script>
            <script src="/js/app.js"></script><tab>
        @endif
    </body>
</html>
