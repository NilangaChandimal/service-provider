<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Worker;
use App\Models\Chat;

class AdminController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $workerCount = Worker::count();
        return view('admin.home', compact('customerCount', 'workerCount'));
    }

    public function showCustomers(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('nic', 'like', "%{$search}%")
                    ->orWhere('contact', 'like', "%{$search}%");
            })
            ->get();
        $userType = 'customer'; // Set userType for customers
        return view('admin.customers', compact('customers', 'userType'));
    }

    public function showWorkers(Request $request)
    {
        $search = $request->input('search');
        $workers = Worker::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('nic', 'like', "%{$search}%")
                    ->orWhere('cnumber', 'like', "%{$search}%")
                    ->orWhere('job', 'like', "%{$search}%")
                    ->orWhere('job_field', 'like', "%{$search}%");
                    
            })
            ->get();
        $userType = 'worker'; // Set userType for workers
        return view('admin.workers', compact('workers', 'userType'));
    }

    public function summary()
    {
        $customerCount = Customer::count();
        $workerCount = Worker::count();
        $latestCustomers = Customer::latest()->take(5)->get();
        $latestWorkers = Worker::latest()->take(5)->get();
        $uniqueJobs = Worker::select('job')->distinct()->pluck('job');
        $uniqueCities = Worker::select('city')->distinct()->pluck('city');
        $uniqueCusCities = Customer::select('city')->distinct()->pluck('city');
        $blockedCustomers = Customer::where('blocked', true)->count();
        $blockedWorkers = Worker::where('blocked', true)->count();

        return view('admin.summary', compact('customerCount', 'workerCount', 'latestCustomers', 'latestWorkers', 'uniqueJobs', 'uniqueCities', 'uniqueCusCities', 'blockedCustomers', 'blockedWorkers'));
    }

public function deleteCustomer($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();
    return redirect()->route('admin.summary')->with('success', 'Customer deleted successfully.');
}

public function deleteWorker($id)
{
    $worker = Worker::findOrFail($id);
    $worker->delete();
    return redirect()->route('admin.summary')->with('success', 'Worker deleted successfully.');
}

public function show($id)
{
    $chat = Chat::with(['worker', 'customer', 'messages.sender'])->findOrFail($id);

    return view('admin.chats.show', compact('chat'));
}

public function blockUnblockCustomer($id)
{
    $customer = Customer::find($id);
    $customer->blocked = !$customer->blocked; // Toggle the blocked status
    $customer->save();

    return redirect()->back()->with('success', 'Customer status updated successfully.');
}

public function blockUnblockWorker($id)
{
    $worker = Worker::find($id);
    $worker->blocked = !$worker->blocked; // Toggle the blocked status
    $worker->save();

    return redirect()->back()->with('success', 'Worker status updated successfully.');
}

}
