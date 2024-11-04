<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-common.head>
    <x-slot name="tittle">
        Inicio - ola k ace
    </x-slot>
</x-common.head>

<body style="background-color: #D5ACAB  ;">

    <x-client.navbar />

    <div class="d-flex">
        <div class="col-9 pt-3" style="height: 874px; overflow-y: scroll;">
            <button class="btn btn-lg btn-outline-secondary text-black text-start" style="width:97%; margin-left:22px;" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse" aria-expanded="false" aria-controls="formCollapse" id="toggleButton">
                Nuevo Post
            </button>

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

            <div class="collapse mt-1 mx-4" id="formCollapse">
                <div class="card card-body">
                    <form action="{{route('insert.post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-8 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-cursor-text"></i></span>
                                    <input type="text" name="tittle" class="form-control" placeholder="Titulo del evento" required>
                                    <div class="invalid-feedback">
                                        @error('tittle') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-week"></i></span>
                                    <input type="date" name="date" class="form-control" required>
                                    <div class="invalid-feedback">
                                        @error('date') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                    <input type="time" name="time" class="form-control" required>
                                    <div class="invalid-feedback">
                                        @error('time') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person-arms-up"></i>
                                    </span>
                                    <select class="form-select form-select" name="people">
                                        <option selected>Publico destinado</option>
                                        @foreach($people as $public)
                                        <option value="{{$public->uid}}">{{$public->name}} : {{$public->age_min}} años en adelante</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-inboxes"></i></span>
                                    <select class="form-select form-select" name="category">
                                        <option selected>Categoria</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->uid}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-border-all"></i></span>
                                    <input type="number" name="spaces" class="form-control" placeholder="Aforo" required>
                                    <div class="invalid-feedback">
                                        @error('spaces') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-house"></i></span>
                                    <input type="text" name="site" class="form-control" placeholder="Direccion del evento" required>
                                    <div class="invalid-feedback">
                                        @error('site') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pt-1 pb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-cursor-text"></i></span>
                                    <textarea type="text" class="form-control" placeholder="Mensaje de la publicacion" name="desc" id="desc" style="height: 100px; resize: none;"></textarea>
                                    <div class="invalid-feedback">
                                        @error('desc') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Publicar</button>
                    </form>
                </div>
            </div>
            {{-- posts --}}
            <div class="mx-4">
                <div class="mt-2">
                    <h1>Mis Publicaciones</h1>
                </div>
                @foreach($posts as $post)
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{$post->event->tittle}}</h3>
                    </div>
                    <div class="d-flex justify-items-center card-body">
                        <div class="border border-black row mx-1 p-2 col-3">
                            <div class="col">
                                <p>Fecha:</p>
                                <p>hora:</p>
                                <p>Lugar:</p>
                                <p>Capacidad:</p>
                            </div>
                            <div class="col">
                                <p>{{$post->event->event_date}}</p>
                                <p>{{$post->event->event_time}}</p>
                                <p>{{$post->event->site}}</p>
                                <p>{{$post->event->spaces}}</p>
                            </div>
                        </div>
                        <div class="col-4 mx-4">
                            <p>{{$post->message}}</p>
                        </div>
                        <div class="col-4">
                            <div class="p-2">
                                <a class="btn btn-outline-black" style="width:115px;" href="/attend/{{$post->event->uid}}">Espacios: {{$post->event->spaces - $post->event->attendees->count()}} </a>

                                <button class="btn btn-outline-black disabled" style="width:175px;">Categoria: {{$post->event->category->name}} </button>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-outline-black disabled" style="width:290px;">Publico dirigido: {{$post->event->people->age_min}} años en adelante </button>
                            </div>
                            <div class="p-2">
                                @if($post->state == 1)
                                <button class="btn btn-outline-success disabled" style="width:290px;">Evento activo</button>
                                @elseif($post->state ==0)
                                <button class="btn btn-outline-warning disabled" style="width:290px;">Pendiente de aprobacion</button>
                                @else
                                <button class="btn btn-outline-danger disabled" style="width:290px;">Oculto por reportes</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-3 bg-white" style="margin-left:0px">
            <div class="card">
                <div class="card-header bg-white">
                    <h1>Tablero</h1>
                </div>
                <div class="card-body" style="height: 799px; overflow-y: scroll;">
                    @if($attends != null)
                        @foreach($attends as $att)
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{{$att->user->register->firstName}} {{$att->user->register->lastName}}</p>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    @else
                    <h1>tablero vacio</h1>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <x-posts.modals />

    <script>
        function savePostUID(uid) {
            localStorage.setItem('postView', uid);
        }

    </script>

</body>
