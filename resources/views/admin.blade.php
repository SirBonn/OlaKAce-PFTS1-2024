<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-common.head>
    <x-slot name="tittle">
        Administracion - ola k ace
    </x-slot>
</x-common.head>

<body style="background-color: #95DB98  ;">

    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #F0FFF0;">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo and Navbar Toggler -->
            <div class="d-flex align-items-center p-2">
                <h1 class="m-0">
                    <a class="text-decoration-none text-black" href="/">
                        <i class="bi bi-tencent-qq"></i> O K H
                    </a>
                </h1>
            </div>


            <div class="p-2 dropdown">
                <button type="button" class="btn btn-lg btn-outline-secondary dropdown-toggle text-black" data-bs-toggle="dropdown">
                    <i class="bi bi-person"> </i>{{Auth::check() ? Auth::user()->nickname : 'Ingresar'}}
                </button>
                <ul class="dropdown-menu dropdown-menu-end position-absolute">
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-gear"> </i>Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="/logout"><i class="bi bi-arrow-bar-left"> </i>Cerrar sesion</a></li>
                </ul>
            </div>

        </div>
    </nav>


    <div class="d-flex container-fluid">
        <div class="col-3 bg-white" style="margin-left:-15px">
            <x-admin.sidebar />
        </div>

        <div class="col-9 pt-3 mx-2">

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-4">
                    <div class="card mt-2">
                        <div class="card-header">Publicos: {{$people->count()}}</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="type">
                                <div class="justify-content-between">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar">
                                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive" style="margin-left:5px; height: 245px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#UID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Edad minima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($people as $public)
                                    <tr class="">
                                        <td scope="row">{{$public->uid}}</td>
                                        <td>{{$public->name}}</td>
                                        <td>{{$public->age_min}} años en adelante</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#peopleForm">Agregar</button>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">Categorias: {{$categories->count()}}</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="type">
                                <div class="justify-content-between">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar">
                                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive" style="margin-left:5px; height: 245px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#UID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr class="">
                                        <td scope="row">{{$category->uid}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryFrom">Agregar</button>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Usuarios: {{$users->count()}}</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="type">
                                <div class="justify-content-between">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar">
                                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive" style="height: 730px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">DPI</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="">
                                        <td scope="row">{{$user->dpi}}</td>
                                        <td>{{$user->nickname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->rol->name}} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Eventos: {{$events->count()}}</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="type">
                                <div class="justify-content-between">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar">
                                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive" style="height: 730px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Capacidad</th>
                                        <th scope="col">Publico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr class="">
                                        <td scope="row"><a href="#" data-bs-toggle="tooltip" data-bs-title="Default tooltip">{{$event->uid}}</a></td>
                                        <td>{{$event->tittle}}</td>
                                        <td>{{$event->spaces}}</td>
                                        <td>{{$event->people->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-admin.modals />
</body>
</html>
