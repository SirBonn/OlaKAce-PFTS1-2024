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
            {{-- <button class="btn btn-lg btn-outline-secondary text-black text-start" style="width:97%; margin-left:22px;" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse" aria-expanded="false" aria-controls="formCollapse" id="toggleButton">
                Nuevo Post
            </button> --}}

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

            {{-- <div class="collapse mt-1 mx-4" id="formCollapse">
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
    </div> --}}

    {{-- posts --}}
    <div class="mx-4">
        @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <h5>{{$post->event->tittle}}</h5>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#reportPostForm" onClick="savePostUID({{$post->uid}})">
                    <i class="bi bi-exclamation-circle"></i>
                </button>
            </div>
            <div class="d-flex justify-items-center card-body">

                <div class="col-9">
                    <p>{{$post->message}}</p>
                </div>
                <div class="border border-black row col-3">
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
            </div>
            <div class="card-footer d-flex">
                <div class="p-2"><button class="btn btn-outline-black disabled">Espacios: {{$post->event->spaces - $post->event->attendees->count()}} </button></div>
                <div class="p-2"><button class="btn btn-outline-black disabled">Publico dirigido: {{$post->event->people->age_min}} años en adelante </button></div>
                <div class="p-2"><button class="btn btn-outline-black disabled">Categoria: {{$post->event->category->name}} </button></div>
                @if($attends->contains('event_uid', $post->event->uid))
                <div class="ms-auto p-2"><a href="/noasist/{{$post->event->uid}}" class="btn btn-outline-danger">Cancelar Asistencia</a></div>
                @else
                <div class="ms-auto p-2"><a href="/asist/{{$post->event->uid}}" class="btn btn-outline-primary">Asistir</a></div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    </div>
    <div class="col-3 bg-white" style="margin-left:0px">
        <div class="card">
            <div class="card-header bg-white">
                <h1>Eventos Proximos</h1>
            </div>
            <div class="card-body" style="height: 799px; overflow-y: scroll;">
                @foreach($attends as $event)
                <div class="card" style="width:18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->event->tittle}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">{{$event->event->event_date}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <x-client.modals :reasons="$reasons" />

    <script>
        function savePostUID(uid) {
            localStorage.setItem('postRepUID', uid);
        }

    </script>

</body>
</html>
