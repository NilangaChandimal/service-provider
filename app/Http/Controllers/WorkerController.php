<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        // Fetch all workers and pass them to the view
        $workers = Worker::all();
        return view('worker.home', compact('workers'));
    }

    public function startChat(Request $request, Worker $worker)
    {
        $customer = Auth::user();

        // Ensure the user is authenticated and is a customer
        if (!$customer || !$customer instanceof \App\Models\Customer) {
            return redirect()->route('customer.home')->with('error', 'You need to be logged in as a customer to start a chat.');
        }

        // Create or find an existing chat
        $chat = Chat::firstOrCreate([
            'customer_id' => $customer->id,
            'worker_id' => $worker->id
        ]);

        // Redirect to the customer's chat page
        return redirect()->route('customer.chats.show', $chat->id);
    }
}
