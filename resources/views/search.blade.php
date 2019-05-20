@extends('base')

@section('title')
Resultado de la busqueda '{{$toSearch}}' - Recircuit
@endsection

@section('content')

<div class="container my-5">
	<div class="card">
		<div class="card-header cst-blue-bg wht-text bold"><p class="text-sub-1">Resultado de la busqueda ' {{$toSearch}} '</p></div>

		<div class="card-body">

			@switch($typeOfSearch)

			@case("design")

			@if(empty($results))
			<p class="mt-3 mb-3 ml-5 text-sub-2">No hay resultados para la busqueda ' {{$toSearch}} '</p>
			@endif
			
			@foreach($results as $result)

				<?php $tImage = $result->thumb_path ?>

			<div class="card selective" onclick="window.location='{{route('schema', ['id' => "$result->id"])}}'">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset("$tImage")}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">

							<div class="card-header d-flex"><b class="w-100">{{$result->title}}</b>
							<p class="w-100 ml-5 mb-0 float-right"><b>{{$result->likes}}</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								{{$result->description}}
								</p>
								<p class="text-sub-3">
								Dificultad: <b>

								@switch($result->difficulty)
									@case(1)
									    Principiante
									    @break

									@case(2)
									    Avanzado
									    @break

									@case(3)
									    Experto
									    @break

									@case(4)
										Imposible
										@break
								@endswitch



							 </b>
								</p>
							</div>
						
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el {{$result->created_at}} por <a href="{{route('profile', ['id' => "$result->idUser"])}}">{{$result->username}}</a></p>
  							</div>
						</div>

					</div>
					

					</div>


			@endforeach	

			@break

			@case("user")

			@if(empty($results))
			<p class="mt-3 mb-3 ml-5 text-sub-2">No hay resultados para la busqueda ' {{$toSearch}} '</p>
			@endif

			@foreach($results as $result)

				<?php $tImage = $result->avatar_path ?>

			<div class="card selective" onclick="window.location='{{route('profile', ['id' => "$result->id"])}}'">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset("$tImage")}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">

							<div class="card-header d-flex"><b class="w-100">{{$result->name}} {{$result->last_name}} | {{$result->username}}</b>
							<p class="w-100 ml-5 mb-0 float-right"><b>{{$result->followers}}</b> Seguidores</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								{{$result->about_me}}
								</p>
							</div>
							
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Miembro desde {{$result->created_at}} </p>
  							</div>
						</div>

					</div>
					

					</div>

			@endforeach

			@break

			@case("date")

			@if(empty($results))
			<p class="mt-3 mb-3 ml-5 text-sub-2">No hay resultados para la busqueda ' {{$toSearch}} '</p>
			@endif
			
			@foreach($results as $result)

				<?php $tImage = $result->thumb_path ?>

			<div class="card selective" onclick="window.location='{{route('schema', ['id' => "$result->id"])}}'">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset("$tImage")}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">

							<div class="card-header d-flex"><b class="w-100">{{$result->title}}</b>
							<p class="w-100 ml-5 mb-0 float-right"><b>{{$result->likes}}</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								{{$result->description}}
								</p>
								<p class="text-sub-3">
								Dificultad: <b>

								@switch($result->difficulty)
									@case(1)
									    Principiante
									    @break

									@case(2)
									    Avanzado
									    @break

									@case(3)
									    Experto
									    @break

									@case(4)
										Imposible
										@break
								@endswitch



							 </b>
								</p>
							</div>
						
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el {{$result->created_at}} por <a href="{{route('profile', ['id' => "$result->idUser"])}}">{{$result->username}}</a></p>
  							</div>
						</div>

					</div>
					

					</div>


			@endforeach	

			@break

			@case("dificulty")

			@if(empty($results))
			<p class="mt-3 mb-3 ml-5 text-sub-2">No hay resultados para la busqueda ' {{$toSearch}} '</p>
			@endif
			
			@foreach($results as $result)

				<?php $tImage = $result->thumb_path ?>

			<div class="card selective" onclick="window.location='{{route('schema', ['id' => "$result->id"])}}'">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset("$tImage")}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">

							<div class="card-header d-flex"><b class="w-100">{{$result->title}}</b>
							<p class="w-100 ml-5 mb-0 float-right"><b>{{$result->likes}}</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								{{$result->description}}
								</p>
								<p class="text-sub-3">
								Dificultad: <b>

								@switch($result->difficulty)
									@case(1)
									    Principiante
									    @break

									@case(2)
									    Avanzado
									    @break

									@case(3)
									    Experto
									    @break

									@case(4)
										Imposible
										@break
								@endswitch



							 </b>
								</p>
							</div>
						
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el {{$result->created_at}} por <a href="{{route('profile', ['id' => "$result->idUser"])}}">{{$result->username}}</a></p>
  							</div>
						</div>

					</div>
					

					</div>


			@endforeach	

			@break




			@endswitch
					

		</div>

	</div>

</div>

<div>
	
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>

@endsection