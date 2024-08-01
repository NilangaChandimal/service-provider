<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('worker.home') }}" class="text-white font-bold">Worker Dashboard</a>
        <div class="flex space-x-4">
            <a href="{{ route('worker.chats.index') }}" class="text-gray-300 hover:text-white">Chats</a>
            <a href="{{ route('worker.profile') }}" class="text-gray-300 hover:text-white">Profile</a>
            <a href="{{ route('worker.login') }}" class="text-gray-300 hover:text-white">Logout</a>
        </div>
    </div>
</nav>
