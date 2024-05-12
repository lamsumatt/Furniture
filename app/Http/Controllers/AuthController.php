<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function login(Request $request)
    // {
    //     // Prepare for login form display or handling login attempt
    //     if ($request->isMethod('get')) {
    //         // Display login form
    //         return view('auth.login');
    //     } else {
    //         // Handle login attempt (usually using POST method)
    //         $credentials = $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required'
    //         ]);
    //         $remember = $request->has('remember');

    //         if (Auth::attempt($credentials, $remember)) {
    //             $request->session()->regenerate();
    //             return redirect()->intended('dashboard'); // Or desired redirect after login
    //         }

    //         return back()->withErrors(['email' => 'Invalid login credentials']);
    //     }
    // }

    // public function postLogin(Request $request) // This route is typically handled by the login() method
    // {
    //     // Logic for handling POST login (usually redundant with login())
    //     // You can remove this method if login() already handles both GET and POST
    // }

    // public function register(Request $request)
    // {
    //     // Prepare for registration form display or handling registration
    //     if ($request->isMethod('get')) {
    //         // Display registration form
    //         return view('auth.register');
    //     } else {
    //         // Handle registration attempt (usually using POST method)
    //         $validator = validator($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|unique:users',
    //             'password' => 'required|string|min:8|confirmed',
    //         ]);

    //         if ($validator->fails()) {
    //             return back()->withErrors($validator);
    //         }

    //         // Create a new user (implementation depends on your user model)
    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //         ]);

    //         // Handle user registration success (e.g., log them in, redirect)
    //         Auth::login($user);
    //         return redirect()->intended('dashboard'); // Or desired redirect after registration
    //     }
    // }

    // public function postRegister(Request $request) // This route is typically handled by the register() method
    // {
    //     // Logic for handling POST registration (usually redundant with register())
    //     // You can remove this method if register() already handles both GET and POST
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect()->route('login'); // Or desired redirect after logout
    // }
}
