@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Customers</h1>
        <div class="mb-6">
            <div class="flex justify-center">
                <input type="text" id="search" placeholder="Search customers..." class="border p-2 rounded-lg w-1/2">
            </div>
        </div>
        @if($customers->isEmpty())
            <p class="text-center text-gray-700">No customers found.</p>
        @else
            <div id="customers-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($customers as $customer)
                    <div class="customer-card relative bg-white bg-opacity-50 backdrop-filter backdrop-blur-lg p-6 rounded-lg shadow-lg transform transition-transform hover:scale-105 overflow-hidden" data-name="{{ $customer->name }}" data-email="{{ $customer->email }}" data-contact="{{ $customer->contact }}" data-address="{{ $customer->address }}">
                        <div class="flex justify-center mb-4">
                            @if($customer->image)
                                <img src="{{ asset('images/' . $customer->image) }}" alt="customer Avatar" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                            @endif
                        </div>
                        <h2 class="text-xl font-bold mb-2 text-center">{{ $customer->name }}</h2>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $customer->email }}</p>
                        <p class="text-gray-700"><strong>Contact:</strong> {{ $customer->contact }}</p>
                        <p class="text-gray-700"><strong>Address:</strong> {{ $customer->city }}</p>
                        <p class="text-gray-700"><strong>Created At:</strong> {{ $customer->created_at }}</p>
                        <p class="text-gray-700"><strong>Updated At:</strong> {{ $customer->updated_at }}</p>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-0 hover:opacity-75 transition-opacity duration-300"></div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            var searchQuery = this.value.toLowerCase();
            var customers = document.querySelectorAll('.customer-card');

            customers.forEach(function(customer) {
                var name = customer.getAttribute('data-name').toLowerCase();
                var email = customer.getAttribute('data-email').toLowerCase();
                var contact = customer.getAttribute('data-contact').toLowerCase();
                var address = customer.getAttribute('data-address').toLowerCase();

                if (name.includes(searchQuery) || email.includes(searchQuery) || contact.includes(searchQuery) || address.includes(searchQuery)) {
                    customer.style.display = '';
                } else {
                    customer.style.display = 'none';
                }
            });
        });
    </script>
@endsection
