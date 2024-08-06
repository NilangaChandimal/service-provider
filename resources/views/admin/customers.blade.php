@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Customers</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($customers as $customer)
                <div class="relative bg-white bg-opacity-50 backdrop-filter backdrop-blur-lg p-6 rounded-lg shadow-lg transform transition-transform hover:scale-105 overflow-hidden">
                    <div class="flex justify-center mb-4">
                        @if($customer->image)
                            <img src="{{ asset('images/' . $customer->image) }}" alt="customer Avatar" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                            @else
                            <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                        @endif
                    </div>
                    <h2 class="text-xl font-bold mb-2 text-center">{{ $customer->name }}</h2>
                    <p class="text-gray-700"><strong>Email:</strong> {{ $customer->email }}</p>
                    <p class="text-gray-700"><strong>Phone:</strong> {{ $customer->contact }}</p>
                    <p class="text-gray-700"><strong>City:</strong> {{ $customer->city }}</p>
                    <p class="text-gray-700"><strong>Created At:</strong> {{ $customer->created_at }}</p>
                    <p class="text-gray-700"><strong>Updated At:</strong> {{ $customer->updated_at }}</p>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-0 hover:opacity-75 transition-opacity duration-300"></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
