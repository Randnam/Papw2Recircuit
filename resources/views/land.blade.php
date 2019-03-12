<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Recircuit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{asset('css/reStyle.css')}}">

	<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#navbarDropdown').click(function() {

				$('#dropMenu').toggle("fast",function() {});
			});

			$('#navbarDropdownProf').click(function() {

				$('#dropProf').toggle("fast",function() {});
			});

			$('#menu_expand').click(function() {

				$('#navbarSupportedContent').toggle("fast",function() {});
			});

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
        <a class="nav-link" href="{{route('main')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle hand-over" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropMenu">
          <a class="dropdown-item" href="{{route('land')}}">Landing</a>
          <a class="dropdown-item" href="{{route('profile')}}">Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item ml-md-5 my-0">
      	<form class="form-inline my-0 my-lg-0">
      	<input class="form-control mr-sm-1" type="search" placeholder="Buscar" aria-label="Buscar">
      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    	</form>
      </li>	
    </ul>
   	 <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="icon-signup"></span> Registrate</a></li>-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle hand-over" id="navbarDropdownProf" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usurario <img src="{{asset('imgs/profileExmpl.png')}}" class="roundd" width="40" height="30">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropProf">
          <a class="dropdown-item" href="{{route('profile')}}"><img src="{{asset('imgs/avatar.png')}}"> {{ __('My Profile') }}</a>
          <a class="dropdown-item" href="{{route('settings')}}"><img src="{{asset('imgs/settings.png')}}"> {{ __('Configuration') }}</a>
          <a class="dropdown-item" href="{{route('settings')}}"><img src="{{asset('imgs/register.png')}}"> Crear diseño</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">{{ __('Logout') }}</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container">

	<div class="col-md-5 float-left lower-aligment">
		<h3>{{ __('Recircuit is a circuit schematic repository holding over a thousand schematics, from simple to complex, we have it') }}</h3>
		
	</div>
	<div class="card border-dark col-md-6 px-0 float-right mt-3">
		<div class="card-header">
			<h2>Registrate ahora</h2>
				<p>Para adentrarte al repositorio más grande de circuitos</p>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ route('register') }}">
			@csrf

				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right" >Nombre:</label> 

				<div class="col-md-6">
				<input type="text" name="name"> 
				</div>

				</div>

				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right" >Apellido:</label> 

				<div class="col-md-6">
				<input type="text" name="lastname"> 
				</div>

				</div>
			
				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right" >Usuario:</label> 

				<div class="col-md-6">
				<input type="text" name="username"> 
				</div>

				</div>

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right">Constraseña:</label> 

					<div class="col-md-6">
					<input type="password" name="password"> 
					</div>

				</div>

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" >Correo:</label> 

					<div class="col-md-6">
					<input type="mail" name="email"> 
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" >Avatar:</label> 

					<div class="col-md-6">
					<input type="file" name="avatar"> 
					</div>
				</div>	

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" >Fondo:</label> 

					<div class="col-md-6">
					<input type="file" name="profile"> 
					</div>
				</div>

				<div class="form-group row justify-content-center">
					
					<button type="submit" class="btn btn-primary col-md-3">Registar</button>
					
				</div>

			</form>
		</div>
	</div>

</div>
</body>
</html>