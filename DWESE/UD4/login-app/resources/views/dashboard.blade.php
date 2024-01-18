<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-semibold mb-6">Dashboard</h1>

            @auth
                <p class="mb-4">¡Bienvenido, {{ Auth::user()->name }}! Has iniciado sesión correctamente.</p>
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Cerrar Sesión</button>
                </form>
            @else
                <p class="mb-4">Debes iniciar sesión para acceder al dashboard.</p>
                <a href="{{ route('login') }}" class="text-blue-500">Iniciar Sesión</a>
            @endauth
        </div>
    </div>
@endsection
