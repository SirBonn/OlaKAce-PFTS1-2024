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
                    <div class="card mt-1">
                        <div class="card-header">Reportes pendientes</div>
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
                                    @foreach($reps as $report)
                                    <tr>
                                        <td>{{$report->uid}}</td>
                                        <td> {{$report->post->event->tittle}} </td>
                                        <td> {{$report->reported}} </td>
                                        <td> {{$report->post->user->nickname}} </td>
                                        <td>
                                        @if($report->state == 0)
                                        <a href="/admin/report/{{$report->uid}}" class="btn btn-sm btn-outline-dark" type="submit"><i class="bi bi-eye"></i></a>
                                        @elseif($report->state == 1)
                                        <a href="/admin/report/{{$report->uid}}" class="btn btn-sm btn-success" type="submit"><i class="bi bi-eye"></i></a>
                                        @else
                                        <a href="/admin/report/{{$report->uid}}" class="btn btn-sm btn-danger" type="submit"><i class="bi bi-eye"></i></a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-8">

                    <div class="card">
                        <div class="card-header">
                            <h4>Publicacion: {{$rep != null ? '#' . $rep->uid . ' ' . $rep->post->event->tittle : ''}}
                                <h4>
                        </div>
                        <div class="card-body" style="margin-left:5px; height: 730px;">
                            @if($rep != null)
                            <div class="card border-primary">
                                <div class="card-header border-primary">
                                    <h6>Contenido:</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Publicado: {{$rep->post->posted}}</p>
                                    <p class="card-text">{{$rep->post->message}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card border-primary mt-3">
                                        <div class="card-header border-primary">
                                            <h6>Evento: #{{$rep->post->event->uid}} {{$rep->post->event->tittle}}</h6>
                                        </div>
                                        <div class="card-body" style="height: 273px">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Categoria:</strong></div>
                                                    <div class="p-2">{{$rep->post->event->category->name}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Publico:</strong></div>
                                                    <div class="p-2">{{$rep->post->event->people->name}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Lugares:</strong></div>
                                                    <div class="p-2">{{$rep->post->event->spaces}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Direccion:</strong></div>
                                                    <div class="p-2">{{$rep->post->event->site}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Fecha y hora:</strong></div>
                                                    <div class="p-2">{{$rep->post->event->event_date}} a las {{$rep->post->event->event_time}} horas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="card border-primary mt-3 ">
                                        <div class="card-header border-primary">
                                            <h6>Publicado por: #{{$rep->post->user->uid}} {{$rep->post->user->nickname}}</h6>
                                        </div>
                                        <div class="card-body" style="height: 273px">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Nombre:</strong></div>
                                                    <div class="p-2">{{$rep->post->user->register->firstName}} {{$rep->user->register->lastName}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>DPI:</strong></div>
                                                    <div class="p-2">{{$rep->post->user->register->dpi}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Cumpleaños:</strong></div>
                                                    <div class="p-2">{{$rep->post->user->register->birthday}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card border-danger mt-3">
                                        <div class="card-header border-danger">
                                            <h6>Reporte: {{$rep->uid}} </h6>
                                        </div>
                                        <div class="card-body" style="height: 160px">
                                            <div class="d-flex">
                                                <div class="p-2"><strong>Motivo:</strong></div>
                                                <div class="p-2">{{$rep->reason->name}}</div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="p-2"><strong>Detalles:</strong></div>
                                                <div class="p-2">{{$rep->message}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="card border-primary mt-3 ">
                                        <div class="card-header border-primary">
                                            <h6>Reportado por: #{{$rep->user->uid}} {{$rep->user->nickname}}</h6>
                                        </div>
                                        <div class="card-body" style="height: 160px">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Nombre:</strong></div>
                                                    <div class="p-2">{{$rep->user->register->firstName}} {{$rep->user->register->lastName}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>DPI:</strong></div>
                                                    <div class="p-2">{{$rep->user->register->dpi}}</div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="p-2"><strong>Cumpleaños:</strong></div>
                                                    <div class="p-2">{{$rep->user->register->birthday}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <h3>Selecciona un reporte para ver su contenido</h3>
                            @endif
                        </div>

                        <div class="card-footer text-muted">
                            <div class="d-flex align-items-end justify-content-end">
                                @if($rep != null && $rep->state == 0)
                                <a href="/admin/report/acept/{{$rep->uid}}" type="button " class="btn btn-danger mx-1">
                                    Aprobar
                                </a>
                                <a href="/admin/report/decline/{{$rep->uid}}" type="button" class="btn btn-success mx-1">
                                    Declinar
                                </a>
                                @elseif($rep != null && $rep->state == 1)

                                <a class="btn btn-success disabled mx-1">Reporte aprobado</a>

                                @elseif($rep != null && $rep->state == 2)

                                <a class="btn btn-danger disabled mx-1">Reporte declinado</a>

                                @else
                                <a class="btn btn-success disabled mx-1">Debes seleccionar una solicitud</a>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

</body>
</html>
