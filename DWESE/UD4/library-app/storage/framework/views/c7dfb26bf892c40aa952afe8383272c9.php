<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
   <?php $__env->slot('header', null, []); ?> 
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          <?php echo e(__('Update Rental')); ?>

      </h2>
   <?php $__env->endSlot(); ?>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                  <!-- Muestra errores de validación -->
                  <?php if($errors->any()): ?>
                      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                          <p class="font-bold">There are validation errors:</p>
                          <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                  <?php endif; ?>

                  <!-- Formulario para crear un nuevo alquiler -->
                  <form action="<?php echo e(route('rentals.update', $rental->id)); ?>" method="POST" class="mb-4">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="mb-4">
                          <label for="book_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Book</label>
                          <select name="book_id" id="book_id" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                              <?php $__currentLoopData = $otherBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($book->id); ?>"><?php echo e($book->title); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($currentBook->id); ?>" selected><?php echo e($currentBook->title); ?></option>
                          </select>
                      </div>

                      <div class="mb-4">
                          <label for="loan_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan Date</label>
                          <input value="<?php echo e($rental->loan_date); ?>" type="date" name="loan_date" id="loan_date" class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                      </div>

                      <div>
                          <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

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
<?php /**PATH /Users/josemaria/Developer/2DAW/Servidor/Laravel/library-app/resources/views/rentals/edit.blade.php ENDPATH**/ ?>