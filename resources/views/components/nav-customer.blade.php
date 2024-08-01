<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('customer.home') }}" class="text-white font-bold">Customer Dashboard</a>
        <div class="flex space-x-4">
            <a href="{{ route('customer.chats.index') }}" class="text-gray-300 hover:text-white">Chats</a>
            <a href="{{ route('customer.profile') }}" class="text-gray-300 hover:text-white">Profile</a>
            <a href="{{ route('customer.login') }}" class="text-gray-300 hover:text-white">Logout</a>
        </div>
    </div>
</nav>
