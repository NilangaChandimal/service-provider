<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300">
            <h1 class="text-2xl font-bold mb-6">Worker Register</h1>
            <form method="POST" action="{{ route('worker.register') }}" enctype="multipart/form-data">
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

                <!-- NIC -->
                <div class="mt-4">
                    <label for="nic" class="block text-sm font-medium text-gray-700">NIC</label>
                    <input id="nic" name="nic" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>

                <!-- Job -->
                <div class="mt-4">
                    <label for="job" class="block text-sm font-medium text-gray-700">Job Category</label>
                    <select id="job" name="job" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm" required>
                        <option value="" disabled selected>Select your job category</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Law">Law</option>
                        <option value="Construction">Construction</option>
                        <option value="Home Service">Home Service</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Rent">Rent</option>
                        <option value="Business">Business</option>
                        <option value="Language Education">Language Education</option>
                        <option value="Delivery">Delivery</option>
                        <option value="Other">Other</option>
                    </select>
                    
                </div>

                <!-- Job Field -->
                <div class="mt-4">
                    <label for="job_field" class="block text-sm font-medium text-gray-700">Job Field</label>
                    <input id="job_field" name="job_field" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                   
                </div>

                <!-- Register Number -->
                <div class="mt-4">
                    <label for="rnumber" class="block text-sm font-medium text-gray-700">Job Register NO</label>
                    <input id="rnumber" name="rnumber" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>

                <!-- Contact Number -->
                <div class="mt-4">
                    <label for="cnumber" class="block text-sm font-medium text-gray-700">Contact</label>
                    <input id="cnumber" name="cnumber" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>

                <!-- City -->
                <div class="mt-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input id="city" name="city" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Your Bio</label>
                    <input id="description" name="description" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                  
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <label class="block text-sm font-medium text-gray-700"> <a href="{{route('worker.login')}}">If you have account</a></label>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded">Register</button>
            </form>
        </div>
    </div>

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
</body>
</html>
