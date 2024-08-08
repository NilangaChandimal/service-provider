<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Login</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300">
            <h1 class="text-2xl font-bold mb-6">Worker Login</h1>
            <form method="POST" action="{{ route('worker.login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <label class="block text-sm font-medium text-gray-700">
                    <a href="{{ route('worker.register') }}">If you don't have an account</a>
                </label>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded">Login</button>
            </form>
        </div>
    </div>

    <script>
        // Check for blocked message in session
        @if (session('blocked'))
            Swal.fire({
                icon: 'error',
                title: 'Blocked',
                text: '{{ session('blocked') }}',
                confirmButtonText: 'OK'
            });
        @endif

        // Check for general errors
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>
