@extends('layouts.app')

@section('title', 'Workers')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Workers</h1>
        <div class="mb-6">
            <div class="flex justify-center">
                <input type="text" id="search" placeholder="Search workers..." class="border p-2 rounded-lg w-1/2">
            </div>
        </div>
        @if($workers->isEmpty())
            <p class="text-center text-gray-700">No workers found.</p>
        @else
            <div id="workers-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($workers as $worker)
                    <div class="worker-card relative bg-white bg-opacity-50 backdrop-filter backdrop-blur-lg p-6 rounded-lg shadow-lg transform transition-transform hover:scale-105 overflow-hidden" data-name="{{ $worker->name }}" data-nic="{{ $worker->nic }}" data-cnumber="{{ $worker->cnumber }}" data-email="{{ $worker->email }}" data-job="{{ $worker->job }}" data-job-field="{{ $worker->job_field }}" data-city="{{ $worker->city }}">
                        <div class="flex justify-center mb-4">
                            @if($worker->image)
                                <img src="{{ asset('images/' . $worker->image) }}" alt="worker Avatar" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                            @endif
                        </div>
                        <h2 class="text-xl font-bold mb-2 text-center">{{ $worker->name }}</h2>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $worker->email }}</p>
                        <p class="text-gray-700"><strong>Phone:</strong> {{ $worker->cnumber }}</p>
                        <p class="text-gray-700"><strong>NIC:</strong> {{ $worker->nic }}</p>
                        <p class="text-gray-700"><strong>Job:</strong> {{ $worker->job }}</p>
                        <p class="text-gray-700"><strong>Job Field:</strong> {{ $worker->job_field }}</p>
                        <p class="text-gray-700"><strong>Reg No:</strong> {{ $worker->rnumber }}</p>
                        <p class="text-gray-700"><strong>City:</strong> {{ $worker->city }}</p>
                        <p class="text-gray-700"><strong>Description:</strong> {{ $worker->description }}</p>
                        <p class="text-gray-700"><strong>Created At:</strong> {{ $worker->created_at }}</p>
                        <p class="text-gray-700"><strong>Updated At:</strong> {{ $worker->updated_at }}</p>
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-0 hover:opacity-75 transition-opacity duration-300"></div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            var searchQuery = this.value.toLowerCase();
            var workers = document.querySelectorAll('.worker-card');

            workers.forEach(function(worker) {
                var name = worker.getAttribute('data-name').toLowerCase();
                var nic = worker.getAttribute('data-nic').toLowerCase();
                var cnumber = worker.getAttribute('data-cnumber').toLowerCase();
                var email = worker.getAttribute('data-email').toLowerCase();
                var job = worker.getAttribute('data-job').toLowerCase();
                var jobField = worker.getAttribute('data-job-field').toLowerCase();
                var city = worker.getAttribute('data-city').toLowerCase();

                if (name.includes(searchQuery) || nic.includes(searchQuery) || cnumber.includes(searchQuery) || email.includes(searchQuery) || job.includes(searchQuery) || jobField.includes(searchQuery) || city.includes(searchQuery)) {
                    worker.style.display = '';
                } else {
                    worker.style.display = 'none';
                }
            });
        });
    </script>
@endsection
