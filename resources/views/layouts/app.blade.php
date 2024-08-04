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
    @elseif(auth()->guard('worker')->check())
        @include('components.nav-worker')
    @elseif(auth()->guard('admin')->check())
        @include('components.nav-admin')
    @endif

    <div class="container mx-auto px-4 py-12">
        @yield('content')
    </div>
    
</body>
</html>
