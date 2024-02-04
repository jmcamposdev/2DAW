<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        // If the user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // If the user is not logged in, show the login form
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        // Get the request credentials
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // The user authentication passed...
            return redirect()->route('dashboard');
        }

        // The user authentication failed...
        return back()->withErrors(['email' => 'Las credenciales proporcionadas no son válidas.']);
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        // If the user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // If the user is not logged in, show the registration form
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to the login page
        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    /**
     * Handle a logout request to the application.
     */
    public function logout()
    {
        // Logout the user
        Auth::logout();
        
        // Redirect to the login page
        return redirect()->route('login');
    }
}
