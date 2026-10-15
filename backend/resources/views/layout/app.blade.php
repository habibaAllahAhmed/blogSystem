<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-light">

    @hasSection('navbar')
    <x-navbar>
        @yield('navbar')
    </x-navbar>
    @endif

    @yield('main')
</body>

</html>