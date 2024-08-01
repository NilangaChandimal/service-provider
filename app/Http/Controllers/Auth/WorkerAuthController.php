<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;

class WorkerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.worker-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('worker')->attempt($credentials)) {
            return redirect()->intended(route('worker.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.worker-register');
    }

    public function register(Request $request)
{
    Log::info('Register method called');

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:workers',
        'nic' => ['required', 'string', 'regex:/^(\d{9}[vVxX]|\d{12})$/'],
        'job' => ['required', 'string'],
        'rnumber' => ['required', 'string', 'max:255'],
        'cnumber' => ['required', 'numeric', 'digits_between:1,255'],
        'city' => ['required', 'string'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
        'job_field' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'password' => 'required|string|min:8|confirmed',
    ]);

    Log::info('Validation passed');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);
        Log::info('Image uploaded');
    } else {
        $filename = 'default.jpg';
    }

    $worker = Worker::create([
        'name' => $request->name,
        'email' => $request->email,
        'nic' => $request->nic,
        'job' => $request->job,
        'rnumber' => $request->rnumber,
        'cnumber' => $request->cnumber,
        'city' => $request->city,
        'image' => $filename,
        'job_field' => $request->job_field,
        'description' => $request->description,
        'password' => bcrypt($request->password),
    ]);

    Log::info('Worker created: ', ['worker' => $worker]);

    Auth::guard('worker')->login($worker);

    return redirect()->route('worker.home');
}

    public function logout(Request $request)
    {
        Auth::guard('worker')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/worker/login');
    }
}
