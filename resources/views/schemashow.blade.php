@extends('main')

@section('design')
				<div class="card d-inline-block col-md-3 mx-sm-1 px-1 cst-mg-start">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{route('schema')}}">
						<img src="{{asset('imgs/RE.png')}}" class="w-100">
						</a>
						<div class="container align-middle w-100 text-sub-3">
						<a href="{{route('schema')}}">Titulo de Circuito</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => 1])}}">Usuario</a></p>
						</div>
					</div>
				</div>


<div class="dropup mx-auto col-md-7 p-1">
<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">

</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="{{route('mschema')}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
<a class="dropdown-item" href="#"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>
 
</div>
</div>


					<div class="card-body d-inline-block ">

						<div class="card col-md-3 d-inline-block">
						<div class="card-body text-center">
				
						<img class="w-100" src="{{asset('imgs/RE.png')}}">		
						<a class="text-sub-3 mx-auto" href="{{route('profile', ['id' => 1])}}" >Usuario</a>
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

    						<button class="btn btn-primary bnw w-25">
    						<img  src="{{asset('imgs/like.png')}}">Me gusta</button>
    						<button class="btn btn-danger rnw w-25 ml-1 float-right">
							<img  src="{{asset('imgs/garbage.png')}}"> Borrar</button>
							
  							</div>
						</div>

					</div>
@endsection