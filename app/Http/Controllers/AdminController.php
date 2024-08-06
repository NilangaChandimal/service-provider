<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Worker;


class AdminController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $workerCount = Worker::count();
        return view('admin.home', compact('customerCount', 'workerCount'));
    }

    public function showCustomers()
{
    $customers = Customer::all();
    $userType = 'customer'; // Set userType for customers
    return view('admin.customers', compact('customers', 'userType'));
}

public function showWorkers()
{
    $workers = Worker::all();
    $userType = 'worker'; // Set userType for workers
    return view('admin.workers', compact('workers', 'userType'));
}


}
