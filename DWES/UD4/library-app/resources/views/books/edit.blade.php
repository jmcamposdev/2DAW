<!-- resources/views/books/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
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

                    <!-- Formulario para editar un libro existente -->
                    <form action="{{ route('books.update', $book->id) }}" method="POST" class="mb-4">
                        @csrf
                        @method('PUT')

                        <!-- Campos del formulario según la estructura de datos de tu libro -->
                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('title', $book->title) }}">
                        </div>

                        <div class="mb-4">
                            <label for="category"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <input type="text" name="category" id="category"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('category', $book->category) }}">
                        </div>

                        <div class="mb-4">
                            <label for="author_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <select name="author_id" id="author_id"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                                <!-- Llena este select con la lista de autores disponibles -->
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->first_name }} {{ $author->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">{{ old('description', $book->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                            <input type="text" name="price" id="price"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('price', $book->price) }}">
                        </div>

                        <div>
                            <button type="submit"
                                class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update
                                Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
