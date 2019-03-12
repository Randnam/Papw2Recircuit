@extends('base')

@section('content')

<div class="container">
	
	<div class="card">
		<div class="card-header cst-blue-bg wht-text">
			<p class="text-sub-1">Modifica tu perfil</p>
		</div>

		<div class="card-body">
			<form class="form-group px-2" method="POST" action="">
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Nombre: </label>
				<input class="ml-2 col-md-5 form-control" type="text" name="title">
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Apellido: </label>
				<input class="ml-2 col-md-5 form-control" type="text" name="title">
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Acerca de ti:</label>
				<input class="ml-2 col-md-5 form-control" type="text" name="desc">
				</div>
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Avatar:</label>
				<input class="ml-1 col-md-5" type="file" name="desc">
				</div>
		
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Portada:</label>
				<input class="ml-1 col-md-5" type="file" name="desc">
				</div>

				<div class="container d-flex justify-content-center">
					<button class="btn btn-info pnw" type="submit"><img src="{{asset('imgs/check.png')}}"> Modificar</button>
				</div>

			</form>

		</div>

	</div>


</div>

@endsection