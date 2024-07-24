<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CarControl-Tableau de bord</title>
        <link rel="shortcut icon" href="{{ url('images/ceet_logo.png') }}" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ url('vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
        

        <!-- inject:css -->
        <link rel="stylesheet" href="{{ url('css/vertical-layout-light/style.css') }}">
        <!-- endinject -->

    </head>
    <body>
        <div class="container-scroller">
            @include('layouts.navigation')

            <div class="container-fluid page-body-wrapper">
                @include('layouts.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @include('partials.header')    
                        <main>
                            {{ $slot }}
                        </main>
                        @include('partials.footer')
                    </div>
                </div>
            </div>
        </div>        
    </body>
</html>
