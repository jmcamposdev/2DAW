<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-semibold mb-6">Registro</h1>

            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/register') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600">Nombre</label>
                    <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 mt-1" value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 mt-1" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Contraseña</label>
                    <input type="password" name="password" id="password" class="border rounded w-full py-2 px-3 mt-1" value="{{ old('password') }}">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-600">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border rounded w-full py-2 px-3 mt-1" value="{{ old('password_confirmation') }}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
@endsection
