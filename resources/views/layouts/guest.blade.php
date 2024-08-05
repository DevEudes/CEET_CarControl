<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CarControl-Connexion</title>
    <link rel="shortcut icon" href="{{ url('images/ceet_logo.png') }}" />

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background-color: #f9f7ed;">
        <div>
            <a class="navbar-brand brand-logo mr-5">
                <img src={{ url('images/ceet_logo.png')}} class="mr-2" alt="logo" style="width: 70px; margin-left:60px" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIENVENUE !! <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONNECTEZ-VOUS
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-crimson focus:border-crimson focus:ring-crimson" style="background-color: #f9f7ed; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0px 6px 6px rgba(0, 0, 0, 0.23);">
            {{ $slot }}
        </div>
        <h1>
            <br/>
            <br/>
        </h1>
    </div>
</body>

<style>
    .bg-crimson {
        background-color: #ef1212;
        border-color: transparent;
    }

    .border-crimson {
        border-color: #ef1212;
    }

    .focus\:border-crimson:focus {
        border-color: #ef1212;
    }

    .focus\:ring-crimson:focus {
        --tw-ring-color: #ef1212;
    }

    .shadow-md {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0px 6px 6px rgba(0, 0, 0, 0.23);
    }
</style>
</html>
