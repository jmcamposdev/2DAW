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
                                @foreach ($tasks as $task)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                        <div class="d-flex align-items-center">
                                            <form class="completeTaskForm" action="">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    aria-label="..." />
                                                {{ $task->message }}
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

                                <li
                                    class="list-group-item d-flex d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            aria-label="..." checked />
                                        <s>Dapibus ac facilisis in</s>
                                    </div>
                                    <a href="#!" data-mdb-toggle="tooltip" title="Remove item">
                                        <i class="fas fa-times text-primary"></i>
                                    </a>
                                </li>
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
</body>

</html>
