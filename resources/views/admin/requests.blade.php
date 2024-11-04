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


            <div class="row">
                <div class="col-5">
                    <div class="card mt-1">
                        <div class="card-header">Publicaciones pendientes</div>
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
                                        <th scope="col">Creado</th>
                                        <th scope="col">Publicador</th>
                                        <th scope="col"> </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($reqs as $request)
                                    <tr>
                                        <td>{{$request->uid}}</td>
                                        <td>{{$request->post->event->tittle}}</td>
                                        <td>{{$request->post->posted}}</td>
                                        <td>{{$request->user->nickname}}</td>
                                        <td>
                                        @if($request->state == '0')
                                            <a href="/admin/requests/{{$request->uid}}" class="btn btn-primary">Ver</a>
                                        @elseif($request->state == '1')
                                            <a href="/admin/requests/{{$request->uid}}" class="btn btn-success">Publicado</a>
                                        @else
                                            <a href="/admin/requests/{{$request->uid}}" class="btn btn-danger">Rechazado</a>
                                        </td>
                                        @endif
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-7">

                    <div class="card">
                        @if($req != null)
                        <div class="card-header">
                            <h3>Evento: {{$req ? '#' . $req->uid . ' ' . $req->post->event->tittle: ''}}
                                <h3>
                        </div>
                        <div class="card-body" style="margin-left:5px; height: 730px;">
                            <div class="row">
                                <div class="col">
                                    <h2>Categoria:</h2>
                                    <h3>{{$req ? $req->post->event->category->name : ''}}</h3>
                                    <h2>Tipo de publico:</h2>
                                    <h3>{{$req ? $req->post->event->public : ''}}</h3>
                                    <h4><small>{{$req ? $req->post->event->people->age_min . ' años en adelante' : ''}}</small></h4>
                                    <h2>Fecha:</h2>
                                    <h3>{{$req ? $req->post->event->event_date . ' a las ' . $req->post->event->event_time . ' horas': ''}}</h3>
                                    <h2>Lugar:</h2>
                                    <h3>{{$req ? $req->post->event->site : ''}}</h3>
                                    <h2>Aforo permitido:</h2>
                                    <h3>{{$req ? $req->post->event->spaces . ' personas': ''}}</h3>
                                    <h2>Mensaje publicado:</h2>
                                    <h3>{{$req ? $req->post->message : ''}}</h3>
                                    <h2>Estado:</h2>
                                    @if($req->state == '0')
                                    <h3>Pendiente</h3>
                                    @elseif($req->state == '1')
                                    <h3 class="text-success">Publicado</h3>
                                    @else
                                    <h3 class="text-danger">RECHAZADO</h3>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-flex align-items-end justify-content-end">
                                @if($req->state == '0')
                                <a href="/admin/decline/{{$req->uid}}" class="btn btn-danger mx-1">Rechazar</a>
                                <a href="/admin/public/{{$req->uid}}" class="btn btn-success mx-1">Publicar</a>
                                @else
                                <a href="/admin/request" class="btn btn-success mx-1">Volver</a>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="card-header">
                            <h3>Evento: <h3>
                        </div>
                        <div class="card-body" style="margin-left:5px; height: 730px;">
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
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-flex align-items-end justify-content-end">
                                <a href="/admin/request" class="btn btn-success mx-1">Debes seleccionar una solicitud</a>
                            </div>
                        </div>
                        @endif



                    </div>


                </div>
            </div>
        </div>

</body>
</html>
