<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Success message -->
                    @if (session('success'))
                        <div class="info-message bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4"
                            role="alert">
                            <p class="font-bold">Success:</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Muestra errores de validación -->
                    @if ($errors->any())
                        <div class="info-message bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4"
                            role="alert">
                            <p class="font-bold">There are validation errors:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table id="authorsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    First Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nationality
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Age
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                                <!-- Agrega más columnas según tu estructura de datos -->
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-600 border-b border-gray-100 dark:border-gray-700">
                            @foreach ($authors as $author)
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <p class="authorId">{{ $author->id }}</p>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $author->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $author->first_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $author->nationality }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $author->gender }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $author->age }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('authors.edit', $author->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                        <form class="inline-block delete-author-form"
                                            action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <!-- Campo oculto para indicar si se deben borrar los libros -->
                                            <input type="hidden" name="delete_books" value="false">
                                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                value="Delete">
                                        </form>
                                    </td>

                                    <!-- Agrega más celdas según tu estructura de datos -->
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Agrega un botón para crear un nuevo autor -->
                        <tfoot class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ route('authors.create') }}"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-5 w-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Create New Author
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para confirmar la eliminación del autor -->
    <div id="deleteAuthorModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-md w-100">
            <p class="text-lg mb-4 dark:text-gray-200 delete-author-modal-text">Deleting this author will also delete all associated books. Are
                you sure?</p>
            <div class="flex justify-end">
                <button id="confirmDeleteAuthor" class="bg-red-500 text-white px-4 py-2 mr-2 rounded-md">
                    Yes, delete
                    author and books</button>
                <button id="cancelDeleteAuthor" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancel</button>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteAuthorForms = document.querySelectorAll('.delete-author-form');
    
            deleteAuthorForms.forEach(deleteAuthorForm => {
                deleteAuthorForm.addEventListener('submit', async function(event) {
                    event.preventDefault();


                    const modal = document.getElementById('deleteAuthorModal'); // Obtener el modal
                    const modalText = document.querySelector('.delete-author-modal-text'); // Obtener el texto del modal
                    const confirmButton = document.getElementById('confirmDeleteAuthor'); // Obtener el botón de confirmación
                    const cancelButton = document.getElementById('cancelDeleteAuthor'); // Obtener el botón de cancelación
                    const deleteBooksInput = event.target.querySelector('input[name="delete_books"]'); // Obtener el campo oculto delete_books
                    const authorId = deleteAuthorForm.parentElement.parentElement.querySelector('.authorId').textContent; // Obtener el ID del autor

                    // Verificar si el autor tiene libros
                    const response = await fetch(`authors/${authorId}/has-books`);
                    const data = await response.json();
                    const authorHasBooks = data.hasBooks;

                    if (!authorHasBooks) {
                        // Cambiar el texto del botón de confirmación y el texto del modal
                        modalText.textContent = 'Are you sure you want to delete this author?';
                        confirmButton.textContent = 'Yes, delete author';
                        cancelButton.textContent = 'Cancel';
                    }

                    // Mostrar el modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');

                    // Manejar el evento del botón de confirmación
                    confirmButton.addEventListener('click', function() {
                        // Establecer el valor del campo delete_books según la decisión del usuario
                        deleteBooksInput.value = authorHasBooks ? 'true' : 'false';

                        // Ocultar el modal
                        modal.classList.add('hidden');

                        // Enviar el formulario después de la confirmación
                        event.target.submit();
                    });

                    // Manejar el evento del botón de cancelación
                    cancelButton.addEventListener('click', function() {
                        // Establecer el valor del campo delete_books según la decisión del usuario
                        deleteBooksInput.value = 'false';

                        // Ocultar el modal
                        modal.classList.add('hidden');
                    });
                });
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize DataTable
        $('#authorsTable').DataTable({
            // Add language options to customize text, if needed
            "language": {
                "search": "Search:",
            }
        });

        // Style the search bar
        $('#authorsTable_filter label input').addClass('border rounded-md p-2 focus:outline-none focus:border-indigo-500');

        // Optionally, you can style the DataTables default pagination
        $('#authorsTable_paginate ul.pagination').addClass('flex space-x-2');
        $('#authorsTable_paginate ul.pagination li').addClass('px-2 py-1 border rounded-md');

        // Add a search bar label for better accessibility
        $('#authorsTable_filter label').addClass('flex items-center');

        // Optionally, you can style other DataTables elements as needed
        // $('#authorsTable_info, #authorsTable_length').addClass('text-sm text-gray-500');
    });
</script>
    

</x-app-layout>
