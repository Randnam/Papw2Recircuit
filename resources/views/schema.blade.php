@extends('base')

@section('content')

<div class="container">
	
	<div class="card">
		
		<div class="card-header">
			<p class="w-100 text-title bold mb-2">Nombre del diseño</p>
			<p class="text-sub-2 bold mb-2">Por <a href="{{route('profile')}}">Usuario</a></p>
			<div class="container d-flex justify-content-end align-self-center">
					<p class="bold">Rating:</p>
					<img  src="{{asset('imgs/starBF.png')}}" width="32px" height="32px">
					<img  src="{{asset('imgs/starBF.png')}}" width="32px" height="32px">
					<img  src="{{asset('imgs/starBF.png')}}" width="32px" height="32px">
					<img  src="{{asset('imgs/starBF.png')}}" width="32px" height="32px">
					<img  src="{{asset('imgs/starBE.png')}}" width="32px" height="32px">
			</div>
		</div>

		<div class="card-body container d-flex justify-content-center">
			<a href="{{route('schema')}}">
			<img src="{{asset('imgs/RE.png')}}" class="w-100">
			</a>
			<a href="{{route('schema')}}">
			<img src="{{asset('imgs/RE.png')}}" class="w-100">
			</a>
			<a href="{{route('schema')}}">
			<img src="{{asset('imgs/RE.png')}}" class="w-100">
			</a>
			<a href="{{route('schema')}}">
			<img src="{{asset('imgs/RE.png')}}" class="w-100">
			</a>	
		</div>	

		<div class="card">
			

			<div class="card-body">
				<h2>Detalles</h2>
				<hr>
				<p><b>Dificultad:</b> Media</p>
				<p><b>Componente: </b> Motores lineales</p>
				<p>Usado para la calibracion de un motor lineal de actuación rápida. Consite en la union de NSE-4543 con un MTU-566 para generar el bias de calibración</p>

				<div class="container container-fluid">
					<p class="text-sub-1 bold">Video de demostración</p>

					<video>
						
					</video>
				</div>

				<div class="container">
					<p>Publicado el: <b>12-12-2049</b></p>
					<button class="btn btn-danger rnw float-right mx-1"><img src="{{asset('imgs/danger.png')}}"> Reportar</button>
					<a href="{{route('mschema')}}"><button class="btn btn-info cnw float-right mx-1"><img src="{{asset('imgs/settings.png')}}"> Modificar</button></a>
					<button class="btn btn-danger rnw float-right mx-1"><img src="{{asset('imgs/garbage.png')}}"> Borrar</button>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header cst-blue-bg wht-text bold">

				<p class="text-sub-1 mb-2"> Comentarios (0) </p>

			</div>
			<div class="card-body">

				<div class="card mb-3">
					<div class="card-header bold"> Deja tu comentario</div>
					<div class="card-body d-inline-block">
						<img class="col-sm-2 h-25" src="{{asset('imgs/RE.png')}}">
						<form class="w-100 container-fluid">
								<div class="form-group row d-flex justify-content-start w-100">
								<label class="col-form-label text-md-right" >Titulo:</label> 

								<div class="w-100">
								<input class="w-100" type="text" name="title"> 
								</div>

								</div>

								<div class="form-group row d-inline-block w-100">
								<label class="col-form-label text-md-right" >Mensaje:</label> 

								<div class="w-100">
								<textarea class="w-100" name="message" cols="60" rows="4"></textarea>
								</div>

								</div>
								<div class="d-flex justify-content-end">
									<button class="btn btn-primary bnw" type="submit">
										<img src="{{asset('imgs/check.png')}}"> Comentar
									</button>
								</div>
						</form>
					</div>
				</div>
				<hr>
				<div class="card">

					<div class="card-body d-inline-block ">

						<div class="card col-md-3 d-inline-block">
						<div class="card-body text-center">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">		
						<a class="text-sub-3 mx-auto" href="{{route('profile')}}" >Usuario</a>
						<p class="text-sub-3 mx-auto bold">ROL DE USUARIO</p>
						
						</div>

						</div>

						<div class="card container-fluid px-0">
							<div class="card-header text-sub-2"><b>Titulo</b>
							<p class="float-right"><b>1</b> Me gusta</p>
							</div>
							<div class="card-body">
								<p class="text-sub-3">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</p>
							</div>
							<div class="card-footer text-muted d-inline-block">
    						<p class="mb-0 w-75 bold">Publicado el 20-10-2049 20:00:32</p>

    						<button class="btn btn-primary pnw w-25"><img  src="{{asset('imgs/add-friend.png')}}">Seguir</button>
    						<button class="btn btn-primary bnw w-25">
    						<img  src="{{asset('imgs/like.png')}}">Me gusta</button>
    						<button class="btn btn-danger rnw w-25 ml-1">
							<img  src="{{asset('imgs/garbage.png')}}"> Borrar</button>
  							</div>
						</div>

					</div>


			</div>
		</div>


	</div>

</div>
</div>

@endsection