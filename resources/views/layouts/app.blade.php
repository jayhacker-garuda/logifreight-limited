<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-button {
            width: 0px;
            height: 0px;
        }

        ::-webkit-scrollbar-thumb {
            background: #001eff;
            border: 0px none #ffffff;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6257ff;
        }

        ::-webkit-scrollbar-thumb:active {
            background: #001eff;
        }

        ::-webkit-scrollbar-track {
            background: #ffffff;
            border: 0px none #ffffff;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track:hover {
            background: #666666;
        }

        ::-webkit-scrollbar-track:active {
            background: #4d4d4d;
        }

        ::-webkit-scrollbar-corner {
            background: transparent;
        }

        [x-cloak]{
            display: none;
        }
    </style>
    @livewireStyles()
</head>

<body class="max-h-screen font-sans antialiased leading-none bg-blue-900 text-cool-gray-500">
    <div class="flex flex-col">

        @if (session()->has('umi'))
            @livewire('nav-bar.member-nav-bar')
        @elseif (session()->has('staff'))

        @livewire('nav-bar.guest-nav-bar')
        @else
        @endif
        <!-- Page Content -->
        <div>
            {{ $slot }}
        </div>
        <!-- End Page Content -->
</div>
<script src="{{ asset('js/alpine/side-nav-toggle.js') }}"></script>
@livewireScripts()
<script src="{{ asset('js/alpine/alpine3-4-2.min.js') }}"></script>

</body>

</html>
