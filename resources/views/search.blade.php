@extends('base')

@section('content')

<div class="container my-5">
	<div class="card">
		<div class="card-header cst-blue-bg wht-text bold"><p class="text-sub-1">Resultado de la busqueda</p></div>

		<div class="card-body">
					

					<div class="card">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">
							<a class="text-dark" href="{{route('schema')}}">
							<div class="card-header d-flex justify-content-around"><b>Titulo de Diseño</b>
							<p class="w-75 ml-5 mb-0"><b>25</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</p>
							</div>
							</a>
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el 2013-34-2049 20:00 por <a href="{{route('profile')}}">Usuario</a></p>
  							</div>
						</div>

					</div>
					

					</div>

					<div class="card">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">
							<a class="text-dark" href="{{route('schema')}}">
							<div class="card-header d-flex justify-content-around"><b>Titulo de Diseño</b>
							<p class="w-75 ml-5 mb-0"><b>25</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</p>
							</div>
							</a>
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el 2013-34-2049 20:00 por <a href="{{route('profile')}}">Usuario</a></p>
  							</div>
						</div>

					</div>
					

					</div>

					<div class="card">
					
					<div class="card-body d-flex justify-content-start">

						<div class="card col-md-3">
						<div class="card-body">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">		
						
						</div>

						</div>

						<div class="card container-fluid px-0">
							<a class="text-dark" href="{{route('schema')}}">
							<div class="card-header d-flex justify-content-around"><b>Titulo de Diseño</b>
							<p class="w-75 ml-5 mb-0"><b>25</b> Me gusta</p></div>
							<div class="card-body">
								<p class="text-sub-3">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</p>
							</div>
							</a>
							<div class="card-footer text-muted d-flex justify-content-around">
    						<p class="mb-0 w-75">Publicado el 2013-34-2049 20:00 por <a href="{{route('profile')}}">Usuario</a></p>
  							</div>
						</div>

					</div>
					

					</div>

		</div>

	</div>

</div>

@endsection