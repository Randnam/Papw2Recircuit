<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

  <title>@yield('title')</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="{{secure_asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="{{secure_asset('css/reStyle.css')}}">

  @yield('scripts')
 


 <script type="text/javascript">
   
 function filter_bar() {
   // body...

   var checker = $("select[name=philter]").val();


   switch(checker){
    case "user":

      $("input[name=toSearch]").attr("placeholder", "Buscar usuarios");
      
       $("input[name=dateStart").hide();
       $("input[name=dateEnd]").hide();
       $("input[name=toSearch]").show();
       $("select[name=dificulty]").hide();

    break;
    case "design":
      $("input[name=toSearch]").attr("placeholder", "Buscar diseños");

       $("input[name=dateStart").hide();
       $("input[name=dateEnd]").hide();
       $("input[name=toSearch]").show();
       $("select[name=dificulty]").hide();

    break;
    case "date":

       $("input[name=toSearch]").hide();
       $("input[name=dateStart").show();
       $("input[name=dateEnd]").show();
       $("select[name=dificulty]").hide();


    break;
    case "dificulty":

       $("select[name=dificulty]").show();
       $("input[name=dateStart").hide();
       $("input[name=dateEnd]").hide();
       $("input[name=toSearch]").hide();

    break;


   }


   //
 }



 </script>

</head>
<body class="circuit-bg">
<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="{{route('main')}}"><img src="{{asset('imgs/RE.png')}}" width="40" height="30" class="d-inline-block align-top" alt="">Recircuit</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="menu_expand">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('main')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item ml-md-5 md-0">
        <form class="form-inline my-0 my-lg-0" action="{{route('search')}}" method="POST">
        @csrf
        <input class="form-control mr-sm-1  expand_bar" type="text" placeholder="Buscar usuario" aria-label="Buscar" name="toSearch">
        <input title="Fecha inicio" class="form-control mr-sm-1" style="display:none;" type="date" name="dateStart">
        <input title="Fecha fin" class="form-control mr-sm-1" style="display:none;" type="date" name="dateEnd">
        <select class="form-control mr-sm-1 expand_bar" title="Dificultad" name="dificulty" style="display:none;">
          <option value="1">Principiante</option>
          <option value="2">Avanzado</option>
          <option value="3">Experto</option>
          <option value="4">Imposible</option>
        </select>
        <select class="form-control mr-sm-1" name="philter" onchange="filter_bar()">
          <option value="user">Usuarios</option>
          <option value="design">Diseños</option>
          <option value="date">Fechas</option>
          <option value="dificulty">Dificultad</option>
        </select>
        <a href="{{route('search')}}"><button class="btn btn-outline-success my-2 my-sm-0"><span>
        <img src="{{asset('imgs/finder.png')}}"></span> Buscar</button></a>
        </form>
      </li> 
    </ul>
     <ul class="nav navbar-nav navbar-right">
     @auth
        <?php $userImg = auth()->user()->avatar_path ?>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle hand-over" id="navbarDropdownProf" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{auth()->user()->name}} {{auth()->user()->last_name}} | {{auth()->user()->username}}
          <img src="{{asset("$userImg")}}" class="roundd" width="40" height="30">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropProf">
          <a class="dropdown-item" href="{{route('profile', ['id' => auth()->user()->id])}}"><img src="{{asset('imgs/avatar.png')}}"> {{ __('My Profile') }}</a>
          <a class="dropdown-item" href="{{route('settings')}}"><img src="{{asset('imgs/settings.png')}}"> {{ __('Configuration') }}</a>
          <a class="dropdown-item" href="{{route('cschema')}}"><img src="{{asset('imgs/register.png')}}"> Crear diseño</a>

          @if(auth()->user()->is_admin == "Yes")
          <a class="dropdown-item" href="{{route('admin')}}"><img src="{{asset('imgs/danger.png')}}"> Reportes</a>
          @endif
          <div class="dropdown-divider"></div>

             <a class="dropdown-item" href="{{route('logout')}}"> 
          <img src="{{asset('imgs/exit.png')}}"> {{ __('Logout') }} </a>

        </div>
      </li>
     @else
      <li>
        <a class="btn btn-primary mr-sm-1" href="{{route('register')}}"><span class="icon-signup"><img src="{{asset('imgs/register.png')}}"></span> {{ __('Register') }}</a></li>
      <li>
      <a class="btn btn-primary" href="{{route('login')}}"><span class="mr-sm-1"> 
        <img src="{{asset('imgs/login.png')}}">
       </span> {{ __('Login') }}</a></li>
    @endauth
    </ul>

  </div>
</nav>

  <div class="container pt-6">
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
