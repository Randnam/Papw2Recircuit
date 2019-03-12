@extends('base')

@section('content')

<div class="container">
	
	<div class="card">

		<div class="card-body">
			
			<h3>Perfil de Usuario</h3>

			<div class="card mb-1">
				

				<div class="card-body d-flex justify-content-start">
			
					<div class="card col-md-4">
						<div class="card-body">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">

						</div>	
					</div>
					<div class="card container-fluid">
						<div class="card-body w-100 p-1">
				
						<p>Nombre: Algo Buendia</p>
						<p class="bold">ROL DE USUARIO</p>
						<p>Miembro desde el: </p>
						<p>0 Seguidores</p>

						<p>Acerca de mi:</p>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

						<p><a href="{{route('settings')}}"><button class="btn btn-info"> <img  src="{{asset('imgs/add-friend.png')}}">Seguir</button> <button class="float-right btn btn-info"><img  src="{{asset('imgs/settings.png')}}"> Modificar</button></a></p>

						</div>	
					</div>

			
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Diseños del usuario</h4>
				<a href="{{route('cschema')}}"><button class="btn btn-info"><img src="{{asset('imgs/add.png')}}"> Crear diseño</button></a>
				</div>

				<div class="card-body">
					<div class="container d-flex justify-content-around mb-1">
					
						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('schema')}}">Titulo de Circuito</a>
								<p class="mb-2">Por <a href="{{route('profile')}}">Usuario</a></p>
								<div class="container d-flex justify-content-center">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
								</div>
								
								<div class="dropdown mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>

								</div>
								
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('schema')}}">Titulo de Circuito</a>
								<p class="mb-2">Por <a href="{{route('profile')}}">Usuario</a></p>
								<div class="container d-flex justify-content-center">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
								</div>

								<div class="dropdown mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
							
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('schema')}}">Titulo de Circuito</a>
								<p class="mb-2">Por <a href="{{route('profile')}}">Usuario</a></p>
								<div class="container d-flex justify-content-center">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
								</div>

								<div class="dropdown mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
							
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('schema')}}">Titulo de Circuito</a>
								<p class="mb-2">Por <a href="{{route('profile')}}">Usuario</a></p>
								<div class="container d-flex justify-content-center">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
									<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
								</div>

								<div class="dropdown mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
								
								</div>
							</div>
						</div>


					</div>
				
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Seguidores del Usuario</h4>
				
				</div>

				<div class="card-body">
					<div class="container d-flex justify-content-around mb-1">
					
						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>


					</div>
				
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Usuarios siguiendo</h4>
				
				</div>

				<div class="card-body">
					<div class="container d-flex justify-content-around mb-1">
					
						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100">
								<a href="{{route('profile')}}">Usuario</a>
								</div>
							</div>
						</div>


					</div>
				
				</div>
			</div>


		</div>



	</div>




</div>

@endsection