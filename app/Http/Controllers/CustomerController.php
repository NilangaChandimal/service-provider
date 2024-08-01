<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker; // Make sure to import the Worker model

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch all workers from the database
        $workers = Worker::all();

        // Pass the workers to the view
        return view('customer.home', compact('workers'));
    }

    public function medicine()
    {
        $workers = Worker::where('job', 'medicine')->get();
        return view('customer.medicine', compact('workers'));
    }

    public function engineering()
    {
        $workers = Worker::where('job', 'engineering')->get();
        return view('customer.engineering', compact('workers'));
    }

    public function law()
    {
        $workers = Worker::where('job', 'law')->get();
        return view('customer.law', compact('workers'));
    }

    public function construction()
    {
        $workers = Worker::where('job', 'construction')->get();
        return view('customer.construction', compact('workers'));
    }

    public function homeservice()
    {
        $workers = Worker::where('job', 'homeservice')->get();
        return view('customer.homeservice', compact('workers'));
    }

    public function wedding()
    {
        $workers = Worker::where('job', 'wedding')->get();
        return view('customer.wedding', compact('workers'));
    }

    public function agriculture()
    {
        $workers = Worker::where('job', 'agriculture')->get();
        return view('customer.agriculture', compact('workers'));
    }

    public function rent()
    {
        $workers = Worker::where('job', 'rent')->get();
        return view('customer.rent', compact('workers'));
    }

    public function business()
    {
        $workers = Worker::where('job', 'business')->get();
        return view('customer.business', compact('workers'));
    }

    public function language()
    {
        $workers = Worker::where('job', 'language')->get();
        return view('customer.language', compact('workers'));
    }

    public function delivery()
    {
        $workers = Worker::where('job', 'delivery')->get();
        return view('customer.delivery', compact('workers'));
    }

    public function other()
    {
        $workers = Worker::where('job', 'other')->get();
        return view('customer.other', compact('workers'));
    }
}