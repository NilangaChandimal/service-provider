@extends('layouts.app')

@section('title', 'Admin Summary')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2 text-center">Total Customers</h2>
                <p class="text-center text-4xl">{{ $customerCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg relative">
                <h2 class="text-2xl font-bold mb-2 text-center">Total Workers</h2>
                <p class="text-center text-4xl">{{ $workerCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2 text-center">Filtered Job Count</h2>
                <div id="filteredJobCount" class="text-center text-4xl text-gray-700"></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-2 text-center">Filtered City Count</h2>
                <div id="filteredCityCount" class="text-center text-4xl text-gray-700"></div>
            </div>
        </div>
        
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-2xl font-bold mb-2" id="sectionTitle">Latest Customers</h2>
            <button id="toggleButton" class="relative inline-flex items-center h-10 rounded-full w-20 bg-green-500">
                <span class="absolute left-1 top-1 bg-white w-8 h-8 rounded-full transition-transform duration-200 transform" id="toggleSwitch"></span>
                <span class="absolute right-2 text-white text-sm font-medium" id="toggleText">Worker</span>
            </button>
        </div>

        <div class="mb-6" id="workerFilter" style="display: none;">
            <label for="jobFilter" class="block text-sm font-medium text-gray-700">Filter by Job:</label>
            <select id="jobFilter" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="all">All</option>
                @foreach($uniqueJobs as $job)
                    <option value="{{ $job }}">{{ $job }}</option>
                @endforeach
            </select>
            <label for="cityFilter" class="block text-sm font-medium text-gray-700 mt-4">Filter by City:</label>
            <select id="cityFilter" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="all">All</option>
                @foreach($uniqueCities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg" id="customerSection">
            <div class="mb-6">
                <label for="customerCityFilter" class="block text-sm font-medium text-gray-700">Filter by City:</label>
                <select id="customerCityFilter" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="all">All</option>
                    @foreach($uniqueCusCities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>
            @if($latestCustomers->isEmpty())
                <p class="text-center text-gray-700">No recent customers found.</p>
            @else
                <ul id="customerList">
                    @foreach($latestCustomers as $customer)
                        <li class="border-b border-gray-300 py-2 flex items-center space-x-4 customer-item" data-city="{{ $customer->city }}">
                            @if($customer->image)
                                <img src="{{ asset('images/' . $customer->image) }}" alt="Customer Avatar" class="w-12 h-12 object-cover rounded-full border-2 border-gray-300">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-12 h-12 object-cover rounded-full border-2 border-gray-300">
                            @endif
                            <div class="flex-1">
                                <p>{{ $customer->name }} - {{ $customer->contact }} - {{ $customer->city }}</p>
                            </div>

                          <!-- Block/Unblock Button -->
                          <form action="{{ route('admin.customers.block_unblock', $customer->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="relative inline-flex items-center h-10 rounded-full w-24 {{ $customer->blocked ? 'bg-red-500' : 'bg-green-500' }}">
                                    <span class="absolute left-1 top-1 bg-white w-8 h-8 rounded-full transition-transform duration-200 transform {{ $customer->blocked ? 'translate-x-14' : 'translate-x-0' }}"></span>
                                    <span class="absolute left-2 text-white text-sm font-medium ">{{ $customer->blocked ? 'Unblock' : '  -----Block' }}</span>
                                </button>
                            </form>

                            <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg hidden" id="workerSection">
            @if($latestWorkers->isEmpty())
                <p class="text-center text-gray-700">No recent workers found.</p>
            @else
                <ul id="workerList">
                    @foreach($latestWorkers as $worker)
                        <li class="border-b border-gray-300 py-2 flex items-center space-x-4 worker-item" data-job="{{ $worker->job }}" data-city="{{ $worker->city }}">
                            @if($worker->image)
                                <img src="{{ asset('images/' . $worker->image) }}" alt="Worker Avatar" class="w-12 h-12 object-cover rounded-full border-2 border-gray-300">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-12 h-12 object-cover rounded-full border-2 border-gray-300">
                            @endif
                            <div class="flex-1">
                                <p>{{ $worker->name }} - {{ $worker->email }} - {{ $worker->cnumber }} - {{ $worker->job }} - {{ $worker->city }}</p>
                            </div>

                            <!-- Block/Unblock Button -->
                            <form action="{{ route('admin.workers.block_unblock', $worker->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="relative inline-flex items-center h-10 rounded-full w-24 {{ $worker->blocked ? 'bg-red-500' : 'bg-green-500' }}">
                                    <span class="absolute left-1 top-1 bg-white w-8 h-8 rounded-full transition-transform duration-200 transform {{ $worker->blocked ? 'translate-x-14' : 'translate-x-0' }}"></span>
                                    <span class="absolute left-2 text-white text-sm font-medium">{{ $worker->blocked ? 'Unblock' : '  -----Block' }}</span>
                                </button>
                            </form>
                            
                            <form action="{{ route('admin.workers.delete', $worker->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function () {
            var toggleSwitch = document.getElementById('toggleSwitch');
            var toggleText = document.getElementById('toggleText');
            var sectionTitle = document.getElementById('sectionTitle');
            var customerSection = document.getElementById('customerSection');
            var workerSection = document.getElementById('workerSection');
            var workerFilter = document.getElementById('workerFilter');

            if (toggleSwitch.classList.contains('translate-x-10')) {
                toggleSwitch.classList.remove('translate-x-10');
                toggleText.textContent = 'Worker';
                sectionTitle.textContent = 'Latest Customers';
                customerSection.classList.remove('hidden');
                workerSection.classList.add('hidden');
                workerFilter.style.display = 'none';
                document.getElementById('filteredJobCount').textContent = ''; // Clear job count when toggled to customers
                document.getElementById('filteredCityCount').textContent = ''; // Clear city count when toggled to customers
            } else {
                toggleSwitch.classList.add('translate-x-10');
                toggleText.textContent = 'Customer';
                sectionTitle.textContent = 'Latest Workers';
                customerSection.classList.add('hidden');
                workerSection.classList.remove('hidden');
                workerFilter.style.display = 'block';
                updateWorkerCounts(); // Update counts when toggled to workers
            }
        });

        document.getElementById('jobFilter').addEventListener('change', function () {
            filterWorkers();
        });

        document.getElementById('cityFilter').addEventListener('change', function () {
            filterWorkers();
        });

        document.getElementById('customerCityFilter').addEventListener('change', function () {
            filterCustomers();
        });

        function filterWorkers() {
            var selectedJob = document.getElementById('jobFilter').value;
            var selectedCity = document.getElementById('cityFilter').value;
            var workerItems = document.querySelectorAll('.worker-item');

            workerItems.forEach(function (item) {
                var jobMatch = (selectedJob === 'all' || item.getAttribute('data-job') === selectedJob);
                var cityMatch = (selectedCity === 'all' || item.getAttribute('data-city') === selectedCity);

                if (jobMatch && cityMatch) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });

            updateWorkerCounts();
        }

        function filterCustomers() {
            var selectedCity = document.getElementById('customerCityFilter').value;
            var customerItems = document.querySelectorAll('.customer-item');

            customerItems.forEach(function (item) {
                if (selectedCity === 'all' || item.getAttribute('data-city') === selectedCity) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });

            updateCustomerCityCount(); // Update city count on customer city filter change
        }

        function updateWorkerCounts() {
            updateJobCount();
            updateCityCount();
        }

        function updateJobCount() {
            var selectedJob = document.getElementById('jobFilter').value;
            var workerItems = document.querySelectorAll('.worker-item');
            var count = 0;

            workerItems.forEach(function (item) {
                if (item.style.display === 'flex') {
                    count++;
                }
            });

            var jobCountText = selectedJob === 'all' ? '' : ` ${selectedJob} - ${count}`;
            document.getElementById('filteredJobCount').textContent = jobCountText;
        }

        function updateCityCount() {
            var selectedCity = document.getElementById('cityFilter').value;
            var workerItems = document.querySelectorAll('.worker-item');
            var count = 0;

            workerItems.forEach(function (item) {
                if (item.style.display === 'flex') {
                    count++;
                }
            });

            var cityCountText = selectedCity === 'all' ? '' : ` ${selectedCity} - ${count}`;
            document.getElementById('filteredCityCount').textContent = cityCountText;
        }

        function updateCustomerCityCount() {
            var selectedCity = document.getElementById('customerCityFilter').value;
            var customerItems = document.querySelectorAll('.customer-item');
            var count = 0;

            customerItems.forEach(function (item) {
                if (item.style.display === 'flex') {
                    count++;
                }
            });

            var cityCountText = selectedCity === 'all' ? '' : ` ${selectedCity} - ${count}`;
            document.getElementById('filteredCityCount').textContent = cityCountText;
        }
    </script>
@endsection
