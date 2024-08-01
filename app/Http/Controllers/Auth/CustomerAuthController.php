<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended(route('customer.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.customer-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'contact' => ['required', 'numeric', 'digits_between:1,255'],
            'city' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
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

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'city' => $request->city,
            'image' => $filename,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.home');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/customer/login');
    }
}