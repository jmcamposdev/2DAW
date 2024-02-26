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
            <?php echo e(__('Create Book')); ?>

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

                    <!-- Formulario para crear un nuevo libro -->
                    <form action="<?php echo e(route('books.store')); ?>" method="POST" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    value="<?php echo e(old('title')); ?>">
                            </div>
                            <div class="mb-4">
                                <label for="category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                <input type="text" name="category" id="category"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    value="<?php echo e(old('category')); ?>">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="author_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <!-- Aquí puedes agregar un campo de selección para elegir un autor existente o crear uno nuevo -->
                            <!-- Ejemplo de campo de selección con autores existentes -->
                            <select name="author_id" id="author_id"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200">
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($author->id); ?>"
                                        <?php echo e(old('author_id') == $author->id ? 'selected' : ''); ?>>
                                        <?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <input type="text" name="description" id="description"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                value="<?php echo e(old('description')); ?>">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="price"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                                <input type="number" name="price" id="price"
                                    class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-200"
                                    min="0" step="0.01" value="<?php echo e(old('price')); ?>">
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
<?php /**PATH /www/wwwroot/servidor.jmcampos.dev/DWES/UD4/library-app/resources/views/books/create.blade.php ENDPATH**/ ?>