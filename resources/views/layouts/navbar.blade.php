<!doctype html>
<html lang="en">

<head>
    <title>Libreria</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <!-- Bootstrap Icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <script src="{{ asset('js/myjs.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<header>
    <nav class="navbar navbar-dark bg-dark fixed-top  ">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas bg-dark offcanvas-start" tabindex="1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Home</a>
                        </li>
                        @hasrole('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('article.create') }}">Subir Publicacion</a>
                            </li>
                           
                            <li class="nav-item"><a href="{{ route('user.role.table') }}" class="nav-link">Usuarios</a></li>
                            <li class="nav-tem"><a href="{{ route('user.create') }}" class="nav-link">Crear Usuario</a></li>
                            <li class="nav-item"><a href="{{ route('user.admin.delete') }}" class="nav-link">Eliminar Usuarios</a></li>
                            <li class="nav-item"><a href="{{ route('youtube.auth')}}" class="nav-link">Youtube Auth</a></li>
                        @endhasrole
                        @guest
                        @else
                            <li>
                                <a href="{{ route('user.profile') }}" class="nav-link">Perfil</a>
                            </li>
                            <div class="nav-item position-absolute bottom-0 end-10 ">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-left" style="font-size: 2rem;"></i>
                                </a>
                            </div>

                        @endguest



                    </ul>


                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @guest
            @else
                <!--- Searchbar --->
                <form class="d-flex">
                    <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endguest

        </div>
    </nav>
</header>

<body>




    <main class="container-fluid mt-5 pt-5">
        <!-- Public -->
        @yield('public')
        <!-- User -->
        @yield('user')
        <!--- Admin ---->
        @hasrole('admin')
            @yield('admin')
        @endhasrole
    </main>



    <!-- Bootstrap JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--
created by C.P.N
-->
</body>
<script src="{{ asset('js/myjs.js') }}"></script>


</html>
