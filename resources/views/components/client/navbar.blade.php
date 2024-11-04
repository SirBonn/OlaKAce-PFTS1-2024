    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #560200;">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo and Navbar Toggler -->
            <div class="d-flex align-items-center p-2">
                <h1 class="m-0">
                    <a class="text-decoration-none text-white" href="/">
                        <i class="bi bi-tencent-qq"></i> O K H
                    </a>
                    <a class="text-decoration-none text-secondary" href="/"><i class="bi bi-house-door"></i></a>
                </h1>
            </div>
            <div class="p-2 dropdown">
                <button type="button" class="btn btn-lg btn-outline-primary dropdown-toggle text-white" data-bs-toggle="dropdown">
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
