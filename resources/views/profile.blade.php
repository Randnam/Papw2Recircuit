@extends('base')

@section('title')
Perfil de {{$user->username}} - Recircuit
@endsection

@section('content')

<div class="container">
	
	<div class="card">

		<div class="card-body">
			
			<h3 class="bold">Perfil de {{$user->username}}</h3>

			<div class="card mb-1">
				

				<div style="background-image: url({{asset("$user->back_path")}});" class="card-body justify-content-start profileBack">
			
					<div class="card col-md-4 d-inline-block">
						<div class="card-body">
				
						<img class="w-100 rounded" src="{{asset("$user->avatar_path")}}">

						</div>	
					</div>
					<div class="card container-fluid d-inline-block">
						<div class="card-body w-100 ml-2 mt-2 p-1">
				
						<p>Nombre: {{ $user->name }} {{ $user->last_name }} </p>
						<p class="bold">
						@if( $user->is_admin = "No" )
							Usuario
						@else
							Administrador
						@endif
						</p>
						<p>Miembro desde el: {{$user->created_at}}</p>
						<p><b id="followCount">{{$followers}}</b> Seguidores</p>

						<p>Acerca de mi:</p>

						<p>{{$user->about_me}}</p>

						<p>
					@auth

						@if(auth()->user()->id != request()->route('id'))

						@if($secCheck == 0)
						<button id="followUser" class="btn btn-info pnw"> <img  src="{{asset('imgs/add-friend.png')}}">Seguir</button>

						<button id="unfollowUser" class="btn btn-info rnw" style="display:none;"> <img  src="{{asset('imgs/add-friend.png')}}">Dejar de seguir</button>

						@else
						<button id="unfollowUser" class="btn btn-info rnw"> <img  src="{{asset('imgs/add-friend.png')}}">Dejar de seguir</button>

						<button id="followUser" class="btn btn-info pnw" style="display:none;"> <img  src="{{asset('imgs/add-friend.png')}}">Seguir</button>

						@endif

						@endif 

						@if(auth()->user()->id == request()->route('id'))
						<a href="{{route('settings')}}"><button class="float-right btn btn-info cnw"><img  src="{{asset('imgs/settings.png')}}"> Modificar</button></a>
						@endif
						
					@endauth

						</p>

						</div>	
					</div>

			
				</div>
			</div>

			
				@if(Session::has('success'))
				<div id="success-board" class="card-body py-2 bg-success rounded">
					<span class="text-white">{{Session::get('success')}}</span>
				</div>	
				@endif
			

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Diseños del usuario</h4>
				@auth

				@if(auth()->user()->id == request()->route('id'))
				<a href="{{route('cschema')}}"><button class="btn btn-info cnw"><img src="{{asset('imgs/add.png')}}"> Crear diseño</button></a>
				@endif

				@endauth
				</div>

				<div class="card-body">
					<div class="container mb-1">
					
					<div id="carouselControl" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
<div class="carousel-item text-center active">
				  	<?php $i = 1 ?>
				  	@foreach($designs as $design)

				  	<?php $tImage = $design->thumb_path ?>
				<div class="card btn d-inline-block col-md-3 mx-sm-1 px-1 cst-mg-start">
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
						@auth

						@if($design->userid == auth()->user()->id)
						<div class="dropup mx-auto col-md-7 p-1">
						<button class="btn btn-secondary gnw dropdown-toggle p-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{asset('imgs/settings.png')}}">

						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="{{route('mschema', ['id' => "$design->id"])}}"><img  src="{{asset('imgs/register.png')}}"> Modificar</a>
						<a class="dropdown-item" href="{{route('dschema', ['id' => "$design->id"])}}"><img src="{{asset('imgs/garbage.png')}}"> Borrar</a>

						</div>
						</div>
						@endif

						@endauth
						</div>
					</div>
				</div>


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

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Usuarios siguiendo</h4>
				
				</div>

				<div class="card-body">
					<div class="container mb-1">
					<div id="carouselControl2" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
						<div class="carousel-item text-center active">
					  	<?php $ise = 1 ?>
					  	@foreach($followings as $userse)

					  	<?php $tImag = $userse->avatar_path ?>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">
							<img src="{{asset("$tImag")}}" class="w-100">
							</a>
							<div class="container align-middle w-100 text-sub-3">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">{{$userse->username}}</a>
							</div>
							<div class="container align-middle w-100 text-sub-3">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">{{ $userse->name }} {{ $userse->last_name }}</a>
							</div>
							<div class="container align-middle w-100 text-sub-3">
								<p>{{$userse->followers}} Seguidores</p>
							</div>

							</div>
						</div>


					  	@if($ise == 3)
					    </div>
					    <?php $ise = 0 ?>
					     <div class="carousel-item text-center">
					    @else
					    	<?php $ise++ ?>
						@endif

					  	@endforeach
				   		</div>
				 	</div>
				  <a class="carousel-control-prev" href="#carouselControl2" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControl2" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
					
					</div>
				
				</div>
			</div>

			<div class="card mb-1">
				<div class="card-header form-inline d-flex justify-content-between cst-blue-bg wht-text">
				<h4>Seguidores del Usuario</h4>
				
				</div>

				<div class="card-body">
					<div class="container mb-1">
					<div id="carouselControl3" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner">
   						<div class="carousel-item text-center active">
					  	<?php $ise = 1 ?>
					  	@foreach($followen as $userse)

					  	<?php $tImag = $userse->avatar_path ?>

						<div class="card col-md-3 mx-sm-1 px-1 d-inline-block">
							<div class="card-body align-middle text-mid px-1">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">
							<img src="{{asset("$tImag")}}" class="w-100">
							</a>
							<div class="container align-middle w-100 text-sub-3">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">{{$userse->username}}</a>
							</div>
							<div class="container align-middle w-100 text-sub-3">
							<a href="{{route('profile', ['id' => "$userse->id"])}}">{{ $userse->name }} {{ $userse->last_name }}</a>
							</div>
							<div class="container align-middle w-100 text-sub-3">
								<p>{{$userse->followers}} Seguidores</p>
							</div>

							</div>
						</div>


					  	@if($ise == 3)
					    </div>
					    <?php $ise = 0 ?>
					     <div class="carousel-item text-center">
					    @else
					    	<?php $ise++ ?>
						@endif

					  	@endforeach
				   		</div>

				  	</div>
				  <a class="carousel-control-prev" href="#carouselControl3" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControl3" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
					
					</div>
				
				</div>
			</div>


		</div>



	</div>




</div>

@endsection

@section('scripts')

  <script type="text/javascript">

    $(document).ready(function() {

        $("#followUser").click(function() {

        	$("#followUser").hide("fast", function() {});


        	var following = {{request()->route('id')}};
        	@auth
        	var follower = {{auth()->user()->id}} ;
        	@endauth

            $.ajax({
            	type:'POST',
            	url:'{{route('follow')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		following: following,
            		follower: follower
            	},
            	cache: false,
            	success: function(data) {
            		
            		$("#followCount").empty();
            		$("#followCount").append(data);

            		

            		$("#unfollowUser").show("fast",function() {});

            	


            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });





        });
      
  
        //

        $("#unfollowUser").click(function() {

        	$("#unfollowUser").hide("fast", function() {});

        	var following = {{request()->route('id')}};

        	@auth
        	var follower = {{auth()->user()->id}} ;

        	@endauth

            $.ajax({
            	type:'POST',
            	url:'{{route('unfollow')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		following: following,
            		follower: follower
            	},
            	cache: false,
            	success: function(data) {
            		
            		$("#followCount").empty();
            		$("#followCount").append(data);

            		

            		$("#followUser").show("fast",function() {});

            	


            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });


        //

        $("success-board").click(function() {

        	$("success-board").fadeOut();


        });

        //
    });

  </script>

@endsection