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
@endsection