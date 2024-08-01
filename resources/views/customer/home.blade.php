@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mx-auto mt-12">
        <div class="flex flex-wrap justify-center">
            <!-- First row of four columns -->
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/1.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.medicine') }}" class="bg-green-500 text-white py-2 px-4 rounded">Medicine</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/2.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.engineering') }}" class="bg-green-500 text-white py-2 px-4 rounded">Engineering</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/3.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.law') }}" class="bg-green-500 text-white py-2 px-4 rounded">Law</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/4.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.construction') }}" class="bg-green-500 text-white py-2 px-4 rounded">Construction</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center mt-0">
            <!-- Second row of four columns -->
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/5.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.homeservice') }}" class="bg-green-500 text-white py-2 px-4 rounded">Home Service</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/6.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.wedding') }}" class="bg-green-500 text-white py-2 px-4 rounded">Wedding</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/7.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.agriculture') }}" class="bg-green-500 text-white py-2 px-4 rounded">Agriculture</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/8.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.rent') }}" class="bg-green-500 text-white py-2 px-4 rounded">Rent</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center mt-0">
            <!-- Third row of four columns -->
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/9.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.business') }}" class="bg-green-500 text-white py-2 px-4 rounded">Business</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/10.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.language') }}" class="bg-green-500 text-white py-2 px-4 rounded">Language</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/11.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.delivery') }}" class="bg-green-500 text-white py-2 px-4 rounded">Delivery</a>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-4">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/12.png') }}" alt="Example Image" class="mx-auto w-24 h-24 object-cover mb-4">
                    <div class="text-center">
                        <a href="{{ route('customer.other') }}" class="bg-green-500 text-white py-2 px-4 rounded">Other</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
