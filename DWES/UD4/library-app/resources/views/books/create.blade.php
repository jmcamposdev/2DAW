<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Book') }}
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

                    <!-- Formulario para crear un nuevo libro -->
                    <form action="{{ route('books.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="mb-4">
                                <label for="category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                <input type="text" name="category" id="category"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    value="{{ old('category') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="author_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <!-- Aquí puedes agregar un campo de selección para elegir un autor existente o crear uno nuevo -->
                            <!-- Ejemplo de campo de selección con autores existentes -->
                            <select name="author_id" id="author_id"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                        {{ $author->first_name }} {{ $author->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <input type="text" name="description" id="description"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('description') }}">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="price"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                                <input type="number" name="price" id="price"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    min="0" step="0.01" value="{{ old('price') }}">
                            </div>
                            <!-- Agrega más campos según tu estructura de datos -->
                        </div>

                        <div>
                            <button type="submit"
                                class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create
                                Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
