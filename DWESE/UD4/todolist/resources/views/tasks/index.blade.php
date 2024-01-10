<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoList</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" id="font-awesome-css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?ver=6.4.2" type="text/css"
        media="all">

</head>

<body>
    <section class="vh-100" style="background-color: #e2d5de;" data-bs-theme="dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <!-- Show Success Message -->
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @elseif($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">

                            <h6 class="mb-3">Awesome Todo List</h6>

                            <form method="POST" action="{{ route('tasks.store') }}"
                                class="d-flex justify-content-center align-items-center mb-4">
                                @csrf
                                <div class="form-outline flex-fill">
                                    <textarea name="message" type="text" id="form3" class="form-control" placeholder="What do you need to do today?"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg ms-2">Add</button>
                            </form>

                            <ul class="list-group mb-0">
                                @if ($tasks->isEmpty())
                                    <p>No Tasks</p>
                                @else
                                    @foreach ($tasks as $task)
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                            <div class="d-flex align-items-center">
                                                <form method="POST" class="toggleCompletedForm"
                                                    action="{{ route('tasks.toggle', $task->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input class="form-check-input me-2" type="checkbox" value=""
                                                        {{ $task->completed ? 'checked' : '' }} aria-label="..." />

                                                    @if ($task->completed)
                                                        <s>{{ $task->message }}</s>
                                                    @else
                                                        {{ $task->message }}
                                                    @endif
                                                </form>

                                            </div>

                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    style="
                                            background: transparent;
                                            border: none;
                                            padding: 0;
                                            ">
                                                    <i class="fas fa-times text-primary"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <!-- Otros campos de la tarea que quieras mostrar -->
                                    @endforeach
                                @endif

                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        const completeTaskInput = document.querySelectorAll('.form-check-input');

        completeTaskInput.forEach((input) => {
            input.addEventListener('click', (e) => {
                const form = e.target.parentElement;
                form.submit();
            });
        });
    </script>
</body>

</html>
