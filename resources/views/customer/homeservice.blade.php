@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Home Service!</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($workers as $worker)
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/' . $worker->image) }}" alt="Worker Avatar" class="w-16 h-16 rounded-full mr-4 object-cover">
                <div>
                    <h3 class="text-lg font-bold">{{ $worker->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $worker->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('customer.startChat', $worker->id) }}">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded">
                    Start Chat
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
