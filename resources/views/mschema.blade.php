@extends('base')

@section('title')
Modificar diseño - Recircuit
@endsection

@section('content')

<div class="container">
	
	<div class="card">
		<div class="card-header cst-blue-bg wht-text">
			<p class="text-sub-1">Modificar diseño</p>
		</div>

		<div class="card-body">
			<form class="form-group px-2" method="POST" action="mschema" enctype="multipart/form-data" >
			@csrf
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Titulo del Diseño: </label>
				<input class="ml-2 col-md-5 form-control" value="{{$design->title}}" type="text" name="title" required>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Detalles:</label>
				<input class="ml-2 col-md-5 form-control" value="{{$design->description}}" type="text" name="description" required>
				</div>

				<div class="row mb-2">
					<label class="text-sub-2 col-md-4">Dificultad: </label>
					<select class="ml-2 col-md-5 form-control" name="difficulty">

					<option value="1" @if($design->difficulty == 1) selected @endif >Principiante</option>
					<option value="2" @if($design->difficulty == 2) selected @endif >Avanzado</option>
					<option value="3" @if($design->difficulty == 3) selected @endif >Experto</option>
					<option value="4" @if($design->difficulty == 4) selected @endif>Imposible</option>
					</select>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Thumbnail: </label>
				<input class="btn btn-light ml-1 col-md-5" type="file" accept=".png, .jpg, .jpeg" name="thumb_path">
				</div>
				
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Imagenes: </label>
				<div class="container col-md-5">
				<input class="btn btn-light ml-1 my-1" type="file" accept=".png, .jpg, .jpeg" name="img_path_one">
				<input class="btn btn-light ml-1 my-1" type="file" accept=".png, .jpg, .jpeg" name="img_path_two">
				<input class="btn btn-light ml-1 my-1" type="file" accept=".png, .jpg, .jpeg" name="img_path_three">
				</div>
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Video:</label>
				<input class="btn btn-light ml-1 col-md-5" type="file" accept=".png, .jpg, .jpeg" name="video_path">
				</div>

				<div class="container d-flex justify-content-center">
					<button class="btn btn-info pnw" type="submit"><img src="{{asset('imgs/check.png')}}"> Modificar</button>
				</div>

			</form>

		</div>

	</div>


</div>

@endsection