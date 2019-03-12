@extends('base')

@section('content')

<div class="container">
	
	<div class="card">
		<div class="card-header cst-blue-bg wht-text">
			<p class="text-sub-1">Crea tu diseño</p>
		</div>

		<div class="card-body">
			<form class="form-group px-2" method="POST" action="">
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Titulo del Diseño: </label>
				<input class="ml-2 col-md-5 form-control" type="text" name="title">
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Detalles:</label>
				<input class="ml-2 col-md-5 form-control" type="text" name="desc">
				</div>
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Thumbnail:</label>
				<input class="ml-1 col-md-5" type="file" name="desc">
				</div>
				
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Imagenes (4 minimo):</label>
				<div class="container col-md-5">
				<input class="ml-1 my-1" type="file" name="desc">
				<input class="ml-1 my-1" type="file" name="desc">
				<input class="ml-1 my-1" type="file" name="desc">
				<input class="ml-1 my-1" type="file" name="desc">
				</div>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Video:</label>
				<input class="ml-1 col-md-5" type="file" name="desc">
				</div>

				<div class="container d-flex justify-content-center">
					<button class="btn btn-info" type="submit"><img src="{{asset('imgs/check.png')}}"> Crear</button>
				</div>

			</form>

		</div>

	</div>


</div>


@endsection