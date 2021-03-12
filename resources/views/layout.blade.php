<!DOCTYPE html>
<html lang="en">
    <style>
        body{
            font-family: Verdana;
        }
    </style>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>@yield('titulo')</title>
    </head>
<body>
    <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #088A85;">
        <div class="container-8">
            <div class="body">
            <a class="navbar-brand text-white"  href="{{ url('/') }}">
               <center><span><img src="imagenes/inicio.png" width="30" height="30" /> Inicio</span></center>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="navbar-brand col fs-1 text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a href="/oficinas" class="navbar-brand col fs-1 text-white">
                                <img src="imagenes/oficina.png" width="50" height="50" />Oficinas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/empleados" class="navbar-brand col fs-1 text-white">
                                <img src="imagenes/empleado.png" width="50" height="50" /> Empleados
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/expedientes" class="navbar-brand col fs-1 text-white">
                                <img src="imagenes/expediente.png" width="55" height="55" />Expedientes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="navbar-brand col fs-1 text-white" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                               <img src="imagenes/exit.png" width="50" height="50" /> Cerrar Sesion</a>
                        </li>
                    @endguest

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('contenido')
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
