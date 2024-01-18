<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-semibold mb-6">Iniciar Sesión</h1>

            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="text-green-500 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 mt-1" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Contraseña</label>
                    <input type="password" name="password" id="password" class="border rounded w-full py-2 px-3 mt-1">
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ingresar</button>
                </div>
            </form>

            <div class="mb-4">
                <p class="text-sm">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-500">Regístrate</a></p>
            </div>
        </div>
    </div>
@endsection
