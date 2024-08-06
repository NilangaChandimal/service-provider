@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <a href="{{ route('admin.customers') }}" class="block relative bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 overflow-hidden">
                    <img src="{{ asset('images/13.png') }}" alt="Customers Image" class="mx-auto w-24 h-24 object-cover mb-4 rounded-full">
                    <div class="absolute inset-0 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Customers</h2>
                    <p class="text-4xl font-semibold text-blue-600">{{ $customerCount }}</p>
                </a>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <a href="{{ route('admin.workers') }}" class="block relative bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 overflow-hidden">
                    <img src="{{ asset('images/2.png') }}" alt="Workers Image" class="mx-auto w-24 h-24 object-cover mb-4 rounded-full">
                    <div class="absolute inset-0 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Workers</h2>
                    <p class="text-4xl font-semibold text-green-600">{{ $workerCount }}</p>
                </a>
            </div>
        </div>
    </div>
@endsection
