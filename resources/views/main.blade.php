@extends('base')

@section('content')

<div class="container">

	<div>
		


	</div>
	
	<div class="card lower-aligment mb-1">
		<div class="card-header bold cst-blue-bg wht-text text-sub-1">Los diseños mas recientes</div>
		<div class="card-body px-0">

			<div class="container mb-1 px-0">


				<div id="carouselControl" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner px-1">
				  	<div class="carousel-item text-center active">
				  	<?php $i = 1 ?>
				  	@foreach($designs as $design)

				  	<?php $tImage = $design->thumb_path ?>
				<button role="link" class="card btn d-inline-block col-md-3 mx-sm-1 px-1 cst-mg-start" onclick="window.location='{{route('schema', ['id' => "$design->id"])}}'">
					<div class="card-body align-middle text-mid px-1">
						<a href="{{ route('schema', ['id' => "$design->id"]) }}">
						<img src="{{asset("$tImage")}}" class="w-100">
						</a>
						<div class="container align-middle mt-5 w-100 text-sub-3">
						<a href="{{ route('schema', ['id' => "$design->id"]) }}">{{$design->title}}</a>
						<p class="mb-2">Por <a href="{{route('profile', ['id' => "$design->userid"])}}">{{$design->username}}</a></p>
						<div class="container d-flex justify-content-center">
							<p>Dificultad: <b>

								@switch($design->difficulty)
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



							 </b></p>
						</div>

						</div>
					</div>
				</button>


				  		@if($i == 3)
					    </div>
					    <?php $i = 0 ?>
					     <div class="carousel-item text-center">
					    @else
					    	<?php $i++ ?>
						@endif

				   
			   		@endforeach
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