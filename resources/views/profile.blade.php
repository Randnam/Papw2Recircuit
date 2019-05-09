@extends('base')

@section('content')

<div class="container">
	
	<div class="card">

		<div class="card-body">
			
			<h3 class="bold">Perfil de {{$user->username}}</h3>

			<div class="card mb-1">
				

				<div style="background-image: url({{asset("$user->back_path")}});" class="card-body justify-content-start profileBack">
			
					<div class="card col-md-4 d-inline-block">
						<div class="card-body">
				
						<img class="w-100" src="{{asset("$user->avatar_path")}}">

						</div>	
					</div>
					<div class="card container-fluid d-inline-block">
						<div class="card-body w-100 ml-2 mt-2 p-1">
				
						<p>Nombre: {{ $user->name }} {{ $user->last_name }} </p>
						<p class="bold">
						@if( $user->is_admin = "No" )
							Usuario
						@else
							Administrador
						@endif
						</p>
						<p>Miembro desde el: {{$user->created_at}}</p>
						<p><b>0</b> Seguidores</p>

						<p>Acerca de mi:</p>

						<p>{{$user->about_me}}</p>

						<p>
					@auth

						@if(auth()->user()->id != request()->route('id'))
						<a href=""><button class="btn btn-info pnw"> <img  src="{{asset('imgs/add-friend.png')}}">Seguir</button></a>
						@endif 

						@if(auth()->user()->id == request()->route('id'))
						<a href="{{route('settings')}}"><button class="float-right btn btn-info cnw"><img  src="{{asset('imgs/settings.png')}}"> Modificar</button></a>
						@endif
						
					@endauth

						</p>

						</div>	
					</div>

			
				</div>
			</div>

			
				@if(Session::has('success'))
				<div class="card-body py-2 bg-success rounded">
					<span class="text-white">{{Session::get('success')}}</span>
				</div>	
				@endif
			

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Diseños del usuario</h4>
				@auth

				@if(auth()->user()->id == request()->route('id'))
				<a href="{{route('cschema')}}"><button class="btn btn-info cnw"><img src="{{asset('imgs/add.png')}}"> Crear diseño</button></a>
				@endif

				@endauth
				</div>

				<div class="card-body">
					<div class="container mb-1">
					
					<div id="carouselControl" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
				<div class="carousel-item text-center active">

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
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
					    <div class="carousel-item text-center">
					    
				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
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
					    <div class="carousel-item text-center">
				
				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
  								</button>
 								 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    								<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
    								<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
   									 
  								</div>
								</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href=" ">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						<div class="dropup mx-auto col-md-7 p-1">
  								<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">
   								
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
				  <a class="carousel-control-prev" href="#carouselControl" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControl" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>


					</div>
				
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Seguidores del Usuario</h4>
				
				</div>

				<div class="card-body">
					<div class="container mb-1">
					<div id="carouselControl2" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
					    <div class="carousel-item text-center active">

					    	<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
			
					    </div>
					    <div class="carousel-item text-center">
					    

					    <div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
					    </div>
					    <div class="carousel-item text-center">
						

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
				   		</div>

				  </div>
				  <a class="carousel-control-prev" href="#carouselControl2" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControl2" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
					
					</div>
				
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Usuarios siguiendo</h4>
				
				</div>

				<div class="card-body">
					<div class="container mb-1">
					<div id="carouselControl3" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
					    <div class="carousel-item text-center active">

					    	<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
			
					    </div>
					    <div class="carousel-item text-center">
					    

					    <div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
					    </div>
					    <div class="carousel-item text-center">
						

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
								<a href="{{route('schema')}}">
								<img src="{{asset('imgs/RE.png')}}" class="w-100">
								</a>
								<div class="container align-middle w-100 text-sub-3">
								<a href=" ">Usuario</a>
								</div>
							</div>
						</div>
				
				   		</div>

				  </div>
				  <a class="carousel-control-prev" href="#carouselControl3" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControl3" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
					
					</div>
				
				</div>
			</div>


		</div>



	</div>




</div>

@endsection