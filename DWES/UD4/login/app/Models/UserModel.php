<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    static function login($username, $password)
    {
        // Search the user in the file
        $users = file(storage_path('app/users.txt'), FILE_IGNORE_NEW_LINES);
        // Iterate the users (Each line is a user)
        foreach ($users as $user) {
            // Split the line in username and password
            [$storedUsername, $storedPassword] = explode(';', $user);
            // Verify if the credentials match
            if ($username === $storedUsername && $password === $storedPassword) {
                // Iniciar sesión
                session()->put('username', $username);
                return true;
            }
        }

        // Si las credenciales no coinciden, redireccionar de nuevo al formulario de login
        return false;
    }

    static function logout()
    {
        // Remove the username from the session
        session()->forget('username');
    }

    static function isLogged()
    {
        // Verify if the user is logged in
        return session()->has('username');
    }

}
