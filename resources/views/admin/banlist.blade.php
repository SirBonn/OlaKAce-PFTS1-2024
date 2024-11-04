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
                    <div class="card mt-1">
                        <div class="card-header">Usuarios Baneados</div>
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
                        <div class="table-responsive" style="margin-left:5px; height: 730px; overflow-y: scroll;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#UID</th>
                                        <th scope="col">Evento</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Publicador</th>
                                        <th scope="col"> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td><button class="btn btn-sm btn-outline-dark" type="submit"><i class="bi bi-eye"></i></button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-8">

                    <div class="card">
                        <div class="card-header">
                        <h3>Publicacion:<h3>
                        </div>
                        <div class="card-body" style="margin-left:5px; height: 730px;">

                        </div>
                        <div class="card-footer text-muted" >
                            <div class="d-flex align-items-end justify-content-end">
                                <button type="button " class="btn btn-danger mx-1">
                                    Rechazar
                                </button>
                                <button type="button" class="btn btn-success mx-1">
                                    Publicar
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

</body>
</html>
