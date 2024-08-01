@extends('layouts.app')

@section('title', ucfirst($userType) . ' Chats')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white p-8 border border-gray-300">
            <h1 class="text-2xl font-bold mb-6">{{ ucfirst($userType) }} Chats</h1>
            <ul>
                @foreach($chats as $chat)
                    <li class="mb-4 flex items-center">
                        <a href="{{ route($userType . '.chats.show', $chat->id) }}" class="text-blue-500 hover:underline flex items-center">
                            <img src="{{ asset('images/' . ($userType === 'customer' ? $chat->worker->image : $chat->customer->image)) }}" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                            <span>
                                 {{ $userType === 'customer' ? $chat->worker->name : $chat->customer->name }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
