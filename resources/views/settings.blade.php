@extends('base')

@section('content')

<div class="container">
	
	<div class="card">
		<div class="card-header cst-blue-bg wht-text">
			<p class="text-sub-1">Modifica tu perfil</p>
		</div>

		<div class="card-body">
			<form class="form-group px-2" method="POST" action="settings" enctype="multipart/form-data">
			@csrf
			@method('PUT')
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Nombre: </label>
				<input class="ml-2 col-md-5 form-control" value="{{$user->name}}" type="text" name="name">
				 @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                 @endif
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Apellido: </label>
				<input class="ml-2 col-md-5 form-control" value="{{$user->last_name}}" type="text" name="last_name">
				 @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                 @endif
				</div>

				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Acerca de ti:</label>
				<input class="ml-2 col-md-5 form-control" value="{{$user->about_me}}" type="text" name="about_me">
				 @if ($errors->has('about_me'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('about_me') }}</strong>
					</span>
                 @endif
				</div>
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Avatar:</label>
				<input class="ml-1 col-md-5" type="file" name="avatar_path">
 				 @if ($errors->has('avatar_path'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('avatar_path') }}</strong>
					</span>
                 @endif
				</div>
		
				<div class="row mb-2">
				<label class="text-sub-2 col-md-4">Portada:</label>
				<input class="ml-1 col-md-5" type="file" name="back_path">
				 @if ($errors->has('back_path'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('back_path') }}</strong>
					</span>
                 @endif
				</div>

				<div class="container d-flex justify-content-center">
					<button class="btn btn-info pnw" type="submit"><img src="{{asset('imgs/check.png')}}"> Modificar</button>
				</div>

			</form>

		</div>

	</div>


</div>

@endsection