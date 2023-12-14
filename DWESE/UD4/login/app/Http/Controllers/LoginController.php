<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Lógica para verificar las credenciales en el archivo de texto
        $users = file(storage_path('app/users.txt'), FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            [$storedUsername, $storedPassword] = explode(';', $user);
            if ($username === $storedUsername && $password === $storedPassword) {
                // Iniciar sesión
                $request->session()->put('username', $username);
                return redirect()->route('dashboard');
            }
        }

        // Si las credenciales no coinciden, redireccionar de nuevo al formulario de login
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }

    public function dashboard(Request $request)
    {
        // Verificar si el usuario ha iniciado sesión
        if (!$request->session()->has('username')) {
            return redirect()->route('login');
        }

        // Si el usuario ha iniciado sesión, mostrar el dashboard
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        // Eliminar los datos de sesión y redirigir al usuario a la vista de logout
        $request->session()->forget('username');
        return view('logout');
    }
}
