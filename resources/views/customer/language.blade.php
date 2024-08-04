@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Language!</h1>

<form method="GET" action="{{ route('customer.language') }}">
    <input 
        type="text" 
        name="search" 
        placeholder="Search workers..." 
        class="border rounded p-2 w-full mb-6"
        value="{{ request('search') }}"
    >
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
        Search
    </button>
</form>
<br>
@php
    $filteredWorkers = session('filteredWorkers');
    $workers = $filteredWorkers ?? $workers;
@endphp

@if($workers->isEmpty())
    <p class="text-gray-600">No workers found.</p>
@else

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($workers as $worker)
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white p-4 rounded-lg shadow-lg">
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
@endif
@endsection
