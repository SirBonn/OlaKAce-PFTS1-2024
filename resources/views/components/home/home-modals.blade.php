<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="height: 300px; width:400px">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #C8C2C1;">
                <h5 class="modal-title">Iniciar Sesion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #DFDDDD">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-10  pt-1 pb-3">
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" name="nickname" class="form-control" placeholder="Username">
                                @error('nickname') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="d-flex p-4" style="background-color: #DFDDDD">
                <div class="align-bottom align-content-end flex-wrap">
                    <a class="col-10 link-underline link-underline-opacity-0" href="#">¿Olvidaste tu contraseña?</a><br>
                    <a class="col-10 link-underline link-underline-opacity-0" href="#" data-bs-toggle="modal" data-bs-target="#singUp">¿No tienes cuenta?... Registrate</a>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #C8C2C1;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    Ingresar
                </button>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="singUp" tabindex="-1" aria-labelledby="singUpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #C8C2C1;">
                <h5 class="modal-title">Registrarse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #DFDDDD">

                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col pt-1 pb-3">
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-credit-card-2-front-fill"></i></span>
                                <input type="number" name="dpi" class="form-control" placeholder="DPI" required min="13">
                                @error('number') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-1 pb-3">
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="example@domain.com" required>
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-1 pb-3">
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" name="nickname" class="form-control" placeholder="exa_mp1e23" required>
                                @error('nickname') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col pt-1 pb-3">
                            <div class="input-group py-4">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer" style="background-color: #C8C2C1;">
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
