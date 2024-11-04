<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="categoryFrom" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Agregar Categoria
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('insert.category')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col pt-1 pb-2">
                            <div class="input-group py-2">
                                <span class="input-group-text"><i class="bi bi-input-cursor-text"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-1 pb-2">
                            <div class="input-group py-2">
                                <span class="input-group-text"><i class="bi bi-123"></i></span>
                                <input type="text" name="description" class="form-control" placeholder="Descripcion" required>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="peopleForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Agregar tipo de publico
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('insert.people')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col pt-1 pb-2">
                            <div class="input-group py-2">
                                <span class="input-group-text"><i class="bi bi-input-cursor-text"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-1 pb-2">
                            <div class="input-group py-2">
                                <span class="input-group-text"><i class="bi bi-123"></i></span>
                                <input type="number" name="agemin" class="form-control" placeholder="Edad minima aceptada" required>
                                @error('agemin') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
