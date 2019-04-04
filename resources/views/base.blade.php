<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Recircuit</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="{{asset('css/reStyle.css')}}">


 
  <script type="text/javascript">
    $(document).ready(function() {


  

    });

  </script>

</head>
<body class="circuit-bg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="{{route('main')}}"><img src="{{asset('imgs/RE.png')}}" width="40" height="30" class="d-inline-block align-top" alt="">Recircuit</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="menu_expand">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('main')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle hand-over" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          El sitio :D
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropMenu">
          <a class="dropdown-item" href="{{route('land')}}">Landing</a>
          <a class="dropdown-item" href="{{route('profile')}}">Perfil</a>
          <a class="dropdown-item" href="{{route('admin')}}">Admin</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Placeholder para entrega</a>
        </div>
      </li>
       <li class="nav-item ml-md-5 md-0">
        <form class="form-inline my-0 my-lg-0" action="{{route('search')}}" method="GET">

        <input class="form-control mr-sm-1" type="text" placeholder="Buscar" aria-label="Buscar">
        <a href="{{route('search')}}"><button class="btn btn-outline-success my-2 my-sm-0"><span>
        <img src="{{asset('imgs/finder.png')}}"></span> Buscar</button></a>

        </form>
      </li> 
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li>
        <a class="btn btn-primary mr-sm-1" href="{{route('register')}}"><span class="icon-signup"><img src="{{asset('imgs/register.png')}}"></span> {{ __('Register') }}</a></li>
      <li>
      <a class="btn btn-primary" href="{{route('login')}}"><span class="mr-sm-1"> 
        <img src="{{asset('imgs/login.png')}}">
       </span> {{ __('Login') }}</a></li>
    </ul>

  </div>
</nav>

  <div class="container">
  @yield('content')
  </div>

<footer class="page-footer font-small wht-text bg-dark pt-4 mt-5">

    <div class="container-fluid text-center text-md-left">

      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase">Acerca de</h5>
          <p>Esta página es completamente ficticia y solo es un proyecto de escuela.<br>Cualquier similitud con la realidad es pura coincidencia</p>
        </div>
       

    </div>

    <div class="footer-copyright text-center py-3">© 2049 Copyright:
      Recircuit
    </div>

    </div>

  </footer>

</body>
</html>
