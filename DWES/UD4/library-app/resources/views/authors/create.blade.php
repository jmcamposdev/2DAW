<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create Author') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <!-- Muestra errores de validación -->
          @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p class="font-bold">There are validation errors:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <!-- Formulario para crear un nuevo autor -->
          <form action="{{ route('authors.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="grid grid-cols-2 gap-4">
              <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                <input type="text" name="first_name" id="first_name" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200" value="{{old('first_name')}}">
              </div>
              <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200" value="{{old('last_name')}}">
              </div>
              <!-- Agrega más campos según tu estructura de datos -->
            </div>

            <div class="mb-4">
              <label for="nationality" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nationality</label>
              <input type="text" name="nationality" id="nationality" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200" value="{{old('nationality')}}">
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                <select name="gender" id="gender" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-4">
              <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Age</label>
              <input type="number" name="age" id="age" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200" min="18" max="100" value="{{old('age')}}">
            </div>
              <!-- Agrega más campos según tu estructura de datos -->
            </div>

            <div>
              <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Author</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
