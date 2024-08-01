<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300">
            <h1 class="text-2xl font-bold mb-6">Customer Register</h1>
            <form method="POST" action="{{ route('customer.register') }}" enctype="multipart/form-data">
                @csrf
                <!-- Profile Image -->
                <div class="mt-4 flex justify-center">
                    <label for="image" class="cursor-pointer">
                        <div class="relative">
                            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img id="preview" class="w-full h-full object-cover" src="{{ asset('images/profile.png') }}" alt="Image Preview">
                            </div>
                            <input type="file" id="image" name="image" class="sr-only" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </label>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <!-- Contact Number -->
                <div class="mt-4">
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                    <input id="contact" name="contact" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>

                <!-- City -->
                <div class="mt-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input id="city" name="city" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded">Register</button>
            </form>
        </div>
    </div>
</body>
<script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ asset('images/profile.png') }}';
            }
        }
    </script>
</html>
