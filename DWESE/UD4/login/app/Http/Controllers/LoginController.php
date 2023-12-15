<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login form. 
     * If the user is logged in, redirect to the dashboard
     */
    public function showLoginForm()
    {
        // Verify if the user is logged in
        if (UserModel::isLogged()) {
            // If the user is logged in, redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // If the user is not logged in, show the login form
        return view('login');
    }

    /**
     * Process the login form
     */
    public function login(Request $request)
    {
        // Get the username and password from the request
        $username = $request->input('username');
        $password = $request->input('password');

        // Verify the credentials
        if (UserModel::login($username, $password)) {
            // If the credentials match, redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // If the credentials don't match, redirect to the login form with an error message
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }

    /**
     * Show the dashboard
     */
    public function dashboard(Request $request)
    {
        // Verify if the user is logged in
        if (!UserModel::isLogged()) {
            // If the user is not logged in, redirect to the login form
            return redirect()->route('login');
        }

        // If the user is logged in, show the dashboard
        return view('dashboard');
    }

    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        // Logout the user
        UserModel::logout();
        // Redirect to the logout view
        return view('logout');
    }
}
