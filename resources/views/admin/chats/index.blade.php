@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Chats</h1>
    
    <ul class="space-y-4">
        @foreach ($chats as $chat)
            <li>
                <a href="{{ route('admin.chats.show', $chat->id) }}" class="block p-4 bg-white hover:bg-gray-100 rounded-lg shadow-md border border-gray-200 transition duration-300 ease-in-out">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-lg font-semibold text-gray-900">{{ $chat->worker->name }}</span>
                            <span class="text-lg font-semibold text-gray-900">&ndash; {{ $chat->worker->email }}</span><br>
                            <span class="text-sm text-gray-500">  {{ $chat->customer->name }}</span>
                            <span class="text-sm text-gray-500"> &ndash; {{ $chat->customer->email }}</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v6H3a1 1 0 100 2h6v6a1 1 0 102 0v-6h6a1 1 0 100-2h-6V4a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
