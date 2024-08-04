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

    public function medicine(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'medicine')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.medicine')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'medicine')->get();
        return view('customer.medicine', compact('workers'));
    }

    public function engineering(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'engineering')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.engineering')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'engineering')->get();
        return view('customer.engineering', compact('workers'));
    }

    public function law(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'law')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.law')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'law')->get();
        return view('customer.law', compact('workers'));
    }

    public function construction(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'construction')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.construction')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'construction')->get();
        return view('customer.construction', compact('workers'));
    }
    public function homeservice(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'homeservice')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.homeservice')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'homeservice')->get();
        return view('customer.homeservice', compact('workers'));
    }

    public function wedding(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'wedding')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.wedding')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'wedding')->get();
        return view('customer.wedding', compact('workers'));
    }

    public function agriculture(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'agriculture')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.agriculture')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'agriculture')->get();
        return view('customer.agriculture', compact('workers'));
    }

    public function rent(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'rent')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.rent')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'rent')->get();
        return view('customer.rent', compact('workers'));
    }

    public function business(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'business')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.business')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'business')->get();
        return view('customer.business', compact('workers'));
    }

    public function language(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'language')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.language')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'language')->get();
        return view('customer.language', compact('workers'));
    }

    public function delivery(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'delivery')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.delivery')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'delivery')->get();
        return view('customer.delivery', compact('workers'));
    }

    public function other(Request $request)
    {
        $search = $request->input('search');

        // Check if a search query was submitted
        if ($search) {
            $workers = Worker::query()
                ->where('job', 'other')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('job', 'LIKE', "%{$search}%")
                          ->orWhere('job_field', 'LIKE', "%{$search}%")
                          ->orWhere('description', 'LIKE', "%{$search}%")
                          ->orWhere('image', 'LIKE', "%{$search}%");
                })
                ->get();

            // Redirect to the same route without the search query after filtering
            return redirect()->route('customer.other')->with('filteredWorkers', $workers);
        }

        // If there is no search query, display all workers in the 'medicine' job category
        $workers = Worker::where('job', 'other')->get();
        return view('customer.other', compact('workers'));
    }
}