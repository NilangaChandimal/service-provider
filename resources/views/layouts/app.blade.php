<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @auth('customer')
        @include('components.nav-customer')
    @endauth

    @auth('worker')
        @include('components.nav-worker')
    @endauth

    @auth('admin')
        @include('components.nav-admin')
    @endauth

    <div class="container mx-auto px-4 py-12">
        @yield('content')
    </div>
</body>
</html>
