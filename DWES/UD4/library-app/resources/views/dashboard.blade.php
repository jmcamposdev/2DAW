<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Rentals') }}
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

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Current Rentals') }}
                    </h2>
                    <!-- Tabla de Rentals -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Book Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Loan Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Return Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-600 border-b border-gray-100 dark:border-gray-700">
                            <!-- Mostrar texto cuando no hay rentas -->
                            @if (count($userRentals) == 0)
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        No rentals yet.
                                    </td>
                                </tr>
                            @endif
                            @foreach ($userRentals as $rental)
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->book->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->loan_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->return_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('rentals.edit', $rental->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

                                            <!-- Formulario para devolver renta -->
                                            <form class="inline-block" action="{{ route('rentals.returnBook', $rental->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"
                                                    value="Return">
                                            </form>

                                            <!-- Formulario para eliminar una renta -->
                                            <form class="inline-block" action="{{ route('rentals.destroy', $rental->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Delete">
                                            </form>
                                        </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- Agrega un botón para crear una nueva renta -->
                        <tfoot class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ route('rentals.create') }}"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-5 w-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Create New Rental
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Returned Rentals') }}
                    </h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Book Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Loan Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Return Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-600 border-b border-gray-100 dark:border-gray-700">
                            <!-- Mostrar texto cuando no hay rentas -->
                            @if (count($userReturnedRentals) == 0)
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        No rentals returned yet.
                                    </td>
                                </tr>
                            @endif
                            @foreach ($userReturnedRentals as $rental)
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->book->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->loan_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rental->return_date }}
                                    </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Formulario para eliminar una renta -->
                                            <form class="inline-block" action="{{ route('rentals.destroy', $rental->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Delete">
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
