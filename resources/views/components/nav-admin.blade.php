<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('admin.home') }}" class="text-white font-bold">Admin Dashboard</a>
        <div class="flex space-x-4">
            <a href="{{ route('admin.summary') }}" class="text-gray-300 hover:text-white">Employee Summary</a>
            <a href="{{ route('admin.profile') }}" class="text-gray-300 hover:text-white">Settings</a>
            <a href="{{ route('admin.login') }}" class="text-gray-300 hover:text-white">Logout</a>
        </div>
    </div>
</nav>
