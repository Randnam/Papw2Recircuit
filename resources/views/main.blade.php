@extends('base')

@section('content')

<div class="container">

	<div>
		


	</div>
	
	<div class="card lower-aligment mb-1">
		<div class="card-header bold cst-blue-bg wht-text text-sub-1">Los diseños mas recientes</div>
		<div class="card-body">

			<div class="container mb-1">


				<div id="carouselControl" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
					    <div class="carousel-item text-center active">

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1 cst-mg-start">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
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
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 h-75 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
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
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
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
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 h-75 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						</div>
					</div>
				</div>
					    </div>
					    <div class="carousel-item text-center">
				
				<div class="card d-inline-block col-md-3 mx-sm-1 px-1 cst-mg-start">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
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
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
						</div>
						</div>
					</div>
				</div>

				<div class="card d-inline-block col-md-3 mx-sm-1 px-1">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 h-75 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						<div class="container d-flex justify-content-center">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/full.png')}}">
							<img class="w-100 h-75" src="{{asset('imgs/emptyO.png')}}">
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

	</div>

</div>

@endsection