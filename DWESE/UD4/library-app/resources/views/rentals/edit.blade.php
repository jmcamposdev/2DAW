<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Update Rental') }}
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

                  <!-- Formulario para crear un nuevo alquiler -->
                  <form action="{{ route('rentals.update', $rental->id) }}" method="POST" class="mb-4">
                      @csrf
                      @method('PUT')
                      <div class="mb-4">
                          <label for="book_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Book</label>
                          <select name="book_id" id="book_id" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                              @foreach ($otherBooks as $book)
                                  <option value="{{ $book->id }}">{{ $book->title }}</option>
                              @endforeach
                              <option value="{{ $currentBook->id }}" selected>{{ $currentBook->title }}</option>
                          </select>
                      </div>

                      <div class="mb-4">
                          <label for="loan_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan Date</label>
                          <input value="{{ $rental->loan_date }}" type="date" name="loan_date" id="loan_date" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                      </div>

                      <div>
                          <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const bookSelect = document.getElementById('book_id');
      const loanDateInput = document.getElementById('loan_date');

      bookSelect.addEventListener('change', function() {
          const selectedBookId = bookSelect.value;

          // Realizar la petición Ajax
          $.ajax({
              url: `/get-occupied-dates?book_id=${selectedBookId}`,
              method: 'GET',
              success: function(response) {
                  const fechasOcupadas = response.occupied_dates;

                  // Desactivar las fechas ocupadas en el selector de fechas
                  fechasOcupadas.forEach(fecha => {
                      const option = document.querySelector(`#loan_date option[value="${fecha}"]`);
                      if (option) {
                          option.disabled = true;
                      }
                  });
              },
              error: function(error) {
                  console.error('Error al obtener las fechas ocupadas:', error);
              }
          });
      });
  });
</script>
