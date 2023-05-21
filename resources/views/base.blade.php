<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>MusicPro</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/musicpro.png" alt="MusicPro" width="200" height="80">
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('shop')}}">Tienda</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">.</a>
              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Route::is('*-mantenedor') ? 'active': '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mantenedor
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item {{ Route::is('marcas-mantenedor') ? 'active': '' }}" href="{{route('marcas-mantenedor')}}">Marcas</a></li>
                  <li><a class="dropdown-item {{ Route::is('categorias-mantenedor') ? 'active': '' }}" href="{{route('categorias-mantenedor')}}">Categorias</a></li>
                  <li><a class="dropdown-item {{ Route::is('subcategorias-mantenedor') ? 'active': '' }}" href="{{route('subcategorias-mantenedor')}}">SubCategorias</a></li>
                  <li><a class="dropdown-item {{ Route::is('productos-mantenedor') ? 'active': '' }}" href="{{route('productos-mantenedor')}}">Productos</a></li>
                </ul>
              </li>
              <li class="nav-item float-end">
                <a href="{{route('cart.index')}}" class="btn btn-outline-success position-relative"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{\Cart::getTotalQuantity()}}
                </span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main>
        <div class="container mt-5">
            @yield('content')
        </div>
      </main>
      <footer>

      </footer>
</body>
</html>
