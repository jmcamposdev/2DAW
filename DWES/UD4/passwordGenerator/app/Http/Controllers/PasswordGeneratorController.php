<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneratedPassword;


class PasswordGeneratorController extends Controller
{
    public function index()
    {
        return view('password.index');
    }

    public function generate(Request $request)
    {
        $length = $request->input('length', 12);
        $hasNumbers = $request->has('numbers');
        $hasSpecialChars = $request->has('special_chars');

        // Lógica para generar la contraseña aquí...

        $password = $this->generatePassword($length, $hasNumbers, $hasSpecialChars);

        // Guarda la contraseña generada en la base de datos
        GeneratedPassword::create([
            'password' => $password
        ]);

        return view('password.index', compact('password'));
    }

    private function generatePassword($length, $hasNumbers, $hasSpecialChars)
    {
        // Lógica para generar la contraseña aquí...

        // Este es solo un ejemplo, puedes personalizar según tus necesidades
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars .= $hasNumbers ? '0123456789' : '';
        $chars .= $hasSpecialChars ? '!@#$%^&*()_+[]{}|,./?;:`~' : '';

        return substr(str_shuffle($chars), 0, $length);
    }
}
