@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mx-auto mt-12">
        
        <div class="flex flex-wrap justify-center">
            <!-- First row of four columns -->
            @foreach([
                ['route' => 'customer.medicine', 'image' => '1.png', 'text' => 'Medicine'],
                ['route' => 'customer.engineering', 'image' => '2.png', 'text' => 'Engineering'],
                ['route' => 'customer.law', 'image' => '3.png', 'text' => 'Law'],
                ['route' => 'customer.construction', 'image' => '4.png', 'text' => 'Construction']
            ] as $item)
                <div class="w-full sm:w-1/2 md:w-1/4 p-4">
                    <div class="relative bg-white  p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 overflow-hidden">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                        <!-- Transparent overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route($item['route']) }}" class="text-white text-lg font-semibold">{{ $item['text'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-wrap justify-center mt-0">
            <!-- Second row of four columns -->
            @foreach([
                ['route' => 'customer.homeservice', 'image' => '5.png', 'text' => 'Home Service'],
                ['route' => 'customer.wedding', 'image' => '6.png', 'text' => 'Wedding'],
                ['route' => 'customer.agriculture', 'image' => '7.png', 'text' => 'Agriculture'],
                ['route' => 'customer.rent', 'image' => '8.png', 'text' => 'Rent']
            ] as $item)
                <div class="w-full sm:w-1/2 md:w-1/4 p-4">
                    <div class="relative bg-white  p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 overflow-hidden">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                        <!-- Transparent overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route($item['route']) }}" class="text-white text-lg font-semibold">{{ $item['text'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-wrap justify-center mt-0">
            <!-- Third row of four columns -->
            @foreach([
                ['route' => 'customer.business', 'image' => '9.png', 'text' => 'Business'],
                ['route' => 'customer.language', 'image' => '10.png', 'text' => 'Language'],
                ['route' => 'customer.delivery', 'image' => '11.png', 'text' => 'Delivery'],
                ['route' => 'customer.other', 'image' => '12.png', 'text' => 'Other']
            ] as $item)
                <div class="w-full sm:w-1/2 md:w-1/4 p-4">
                    <div class="relative bg-white  p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 overflow-hidden">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                        <!-- Transparent overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <a href="{{ route($item['route']) }}" class="text-white text-lg font-semibold">{{ $item['text'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
