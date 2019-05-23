@extends('base')

@section('title')
Crear diseño - Recircuit
@endsection

@section('content')

<div class="container">
	
	<div class="card">
		<div class="card-header cst-blue-bg wht-text">
			<p class="text-sub-1">Crea tu diseño</p>
		</div>

		<div class="card-body">
			<form class="form-group px-2" method="POST" action="cschema" enctype="multipart/form-data">
			@csrf

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Titulo del Diseño: </label>
				<input class="ml-2 col-md-5 form-control" type="text" name="title" required>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Detalles:</label>
				<input class="ml-2 col-md-5 form-control" type="text" name="description" required>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Dificultad: </label>
				<select class="ml-2 col-md-5 form-control" name="difficulty">
				<option value="1">Principiante</option>
				<option value="2">Avanzado</option>
				<option value="3">Experto</option>
				<option value="4">Imposible</option>
				</select>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Thumbnail:</label>
				<input class="ml-1 col-md-5" type="file" name="thumb_path" required>
				</div>
				
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Imagenes:</label>
				<div class="container col-md-5">
				<input class="ml-1 my-1" type="file" name="img_path_one" required>
				<input class="ml-1 my-1" type="file" name="img_path_two" required>
				<input class="ml-1 my-1" type="file" name="img_path_three" required>
				</div>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Video (MP4):</label>
				<input class="ml-1 col-md-5" type="file" name="video_path" required>
				</div>

				<div class="container d-flex justify-content-center">
					<button class="btn btn-info" type="submit"><img src="{{asset('imgs/check.png')}}"> Crear</button>
				</div>

			</form>

		</div>

	</div>


</div>


@endsection