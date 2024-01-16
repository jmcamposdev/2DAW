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
            <?php echo e(__('Your Rentals')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Success message -->
                    <?php if(session('success')): ?>
                        <div class="info-message bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4"
                            role="alert">
                            <p class="font-bold">Success:</p>
                            <p><?php echo e(session('success')); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Muestra errores de validación -->
                    <?php if($errors->any()): ?>
                        <div class="info-message bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4"
                            role="alert">
                            <p class="font-bold">There are validation errors:</p>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        <?php echo e(__('Current Rentals')); ?>

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
                            <?php if(count($userRentals) == 0): ?>
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        No rentals yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php $__currentLoopData = $userRentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->id); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->book->title); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->user->name); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->loan_date); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->return_date); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="<?php echo e(route('rentals.edit', $rental->id)); ?>"
                                                class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

                                            <!-- Formulario para devolver renta -->
                                            <form class="inline-block" action="<?php echo e(route('rentals.returnBook', $rental->id)); ?>"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"
                                                    value="Return">
                                            </form>

                                            <!-- Formulario para eliminar una renta -->
                                            <form class="inline-block" action="<?php echo e(route('rentals.destroy', $rental->id)); ?>"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Delete">
                                            </form>
                                        </td>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <!-- Agrega un botón para crear una nueva renta -->
                        <tfoot class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="<?php echo e(route('rentals.create')); ?>"
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
                        <?php echo e(__('Returned Rentals')); ?>

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
                            <?php if(count($userReturnedRentals) == 0): ?>
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        No rentals returned yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php $__currentLoopData = $userReturnedRentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-gray-100 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->id); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->book->title); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->user->name); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->loan_date); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php echo e($rental->return_date); ?>

                                    </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- Formulario para eliminar una renta -->
                                            <form class="inline-block" action="<?php echo e(route('rentals.destroy', $rental->id)); ?>"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                    value="Delete">
                                            </form>
                                        </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php /**PATH /Users/josemaria/Developer/2DAW/Servidor/Laravel/library-app/resources/views/dashboard.blade.php ENDPATH**/ ?>