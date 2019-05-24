@extends('base')

@section('title')
{{$design->title}} - Recircuit
@endsection

@section('content')

<div class="container">
	
	<div class="card">
		
		<div class="card-header">
			<p class="w-100 text-title bold mb-2">{{$design->title}}</p>
			<p class="text-sub-2 bold mb-2">Por 
			<a href="{{route('profile', ['id' => "$design->userid"])}}">
			{{$design->username}}
			</a>
			</p>
			<div class="container d-flex justify-content-end align-self-center">
			<p class="text-sub-1"> <b id="deslikesCont">{{$deslikes}}</b> Me gusta</p>
			</div>
		</div>

		<?php 

		$oneImage = $design->img_path_one;
		$twoImage = $design->img_path_two;
		$threeImage = $design->img_path_three;
		$vidDem = $design->video_path;

		 ?>

		<div class="card-body container d-flex justify-content-center">
			<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
			<img src="{{asset("$oneImage")}}" class="w-100">
			</button>

			<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
			<img src="{{asset("$twoImage")}}" class="w-100">
			</button>
			
			<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
			<img src="{{asset("$threeImage")}}" class="w-100">
			</button>	
		</div>	

		<div class="card">
			

			<div class="card-body">
				<h2>Detalles</h2>
				<hr>
				<p><b>Dificultad:</b>

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

				</p>

				<p>{{$design->description}}</p>

				<div class="container container-fluid">
					<p class="text-sub-1 bold">Video de demostración</p>

					<video class="text-center w-100 h-100" controls>
						<source src="{{asset("$vidDem")}}" type="video/MP4">
					</video>
				</div>

				<div class="container">
					<p>Publicado el: <b>{{$design->created_at}}</b></p>
					@auth
          <div class="col-sx-2 form-inline float-right">
          <select class="form-control float-right" name="reasonRep">
            <option value="1">Contenido inapropiado</option>
            <option value="2">Contenido ofensivo</option>
            <option value="3">Contenido de naturaleza sexual</option>
            <option value="4">Contenido deceptivo o irrevelevante</option>
          </select>
          </div>
					<button id="repDesign" class="btn btn-danger rnw float-right mx-1"><img src="{{asset('imgs/danger.png')}}"> Reportar</button>
					@if($design->userid == auth()->user()->id)
					<a href="{{route('mschema', ['id' => "$design->id"])}}"><button class="btn btn-info cnw float-right mx-1"><img src="{{asset('imgs/settings.png')}}"> Modificar</button></a>

          <a href="{{route('dschema', ['id' => "$design->id"])}}">
					<button class="btn btn-danger rnw float-right mx-1"><img src="{{asset('imgs/garbage.png')}}"> Borrar</button></a>
					@endif

					@if($design->userid != auth()->user()->id)

					@if($secCheck == 0)
					<button id="likeDesign" class="btn btn-primary float-left bnw w-25">
					<img  src="{{asset('imgs/like.png')}}">Me gusta</button>

					<button id="dislikeDesign" class="btn btn-primary float-left rnw w-25" style="display:none;">
					<img  src="{{asset('imgs/like.png')}}">Ya no me gusta :c</button>
					@else
					

					<button id="dislikeDesign" class="btn btn-primary float-left rnw w-25" >
					<img  src="{{asset('imgs/like.png')}}">Ya no me gusta :c</button>


					<button id="likeDesign" class="btn btn-primary float-left bnw w-25" style="display:none;">
					<img  src="{{asset('imgs/like.png')}}">Me gusta</button>
					
					@endif

					@endif

					@endauth
				</div>
			</div>
		</div>

		@if(Session::has('success'))
		<div class="card-body py-2 bg-success rounded">
			<span class="text-white">{{Session::get('success')}}</span>
		</div>	
		@endif

		<div class="card">
			<div class="card-header cst-blue-bg wht-text bold">

				<p class="text-sub-1 mb-2"> Comentarios (<b id="commentAmount">0</b>) </p>

			</div>
			<div class="card-body">

				<div class="card mb-3">
					<div class="card-header bold"> Deja tu comentario</div>

					@auth
					<div class="card-body d-inline-block">
						
						<div class="w-100 container-fluid">
								<div class="form-group row d-flex justify-content-start w-100">
								<label class="col-form-label text-md-right" >Titulo:</label> 

								<div class="w-100">
								<input class="w-100" type="text" id="title" name="title"> 
								</div>

								</div>

								<div class="form-group row d-inline-block w-100">
								<label class="col-form-label text-md-right" >Mensaje:</label> 

								<div class="w-100">
								<textarea class="w-100" id="content" name="message" cols="60" rows="4"></textarea>
								</div>

								</div>
								<div class="d-flex justify-content-end">
									<button class="btn btn-primary bnw" id="subComment">
										<img src="{{asset('imgs/check.png')}}"> Comentar
									</button>
								</div>
						</div>
					</div>
					@else

					<p class="bold ml-5 mt-3"><a href="{{route('login')}}">Inicia sesión</a> para dejar un comentario</p>

					@endauth

				</div>
				<hr>
				<div id="commSection" class="card">






				</div>
		</div>


	</div>

</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
		
	$(document).ready(function() {

		Reload();

		 $("#likeDesign").click(function() {

        	$("#likeDesign").hide("fast", function() {});

        	var idDesign = {{request()->route('id')}};

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

            $.ajax({
            	type:'POST',
            	url:'{{route('likeDesign')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idDesign: idDesign,
            		idUser: idUser
            	},
            	cache: false,
            	success: function(data) {
            		
            		$("#deslikesCont").empty();
            		$("#deslikesCont").append(data);

            		

            		$("#dislikeDesign").show("fast",function() {});

            	


            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });
      
		///

		$("#dislikeDesign").click(function() {

        	$("#dislikeDesign").hide("fast", function() {});

        	var idDesign = {{request()->route('id')}};

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

            $.ajax({
            	type:'POST',
            	url:'{{route('dislikeDesign')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idDesign: idDesign,
            		idUser: idUser
            	},
            	cache: false,
            	success: function(data) {
            		
            		$("#deslikesCont").empty();
            		$("#deslikesCont").append(data);

            		

            		$("#likeDesign").show("fast",function() {});

            	


            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });

        ///

        $("#subComment").click(function() {


        	var idDesign = {{request()->route('id')}};

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

            $.ajax({
            	type:'POST',
            	url:'{{route('comment')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idDesign: idDesign,
            		idUser: idUser,
            		title: $("#title").val(),
            		content: $("#content").val()
            	},
            	cache: false,
            	success: function(data) {
          	
          			$("#title").val("")
          			$("#content").val("")

          			Reload();

            	
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });

        ///

        function Reload(){

        	var idDesign = {{request()->route('id')}};

        	$.ajax({
            	type:'POST',
            	url:'{{route('getComment')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idDesign: idDesign,
            	},
            	cache: false,
            	success: function(data) {


          			$("#commSection").empty();

          			var counter = 0;
          			

          			data.forEach(function(element) {
  

          			
          				$("#commSection").append(

          					element

          					);
          			
          			counter++;

          			});

          			

          			if(counter == 0){
          			$("#commSection").append("<p class='mt-3 mb-3 ml-5 text-sub-2'> Aun no hay comentarios. Se el primero. </p>");
          			}else{

          			$("#commentAmount").empty();
          			$("#commentAmount").append(counter);
          			}
            	
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });



        }

        ///

         $("body").on('click','.deleteCom', function() {

        	var idComment = $(this).parent().find('input').val();

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

        	$(this).hide();

        	$(this).parents('.comCard').hide();

            $.ajax({
            	type:'POST',
            	url:'{{route('deleteComment')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idComment: idComment,
            		idUser: idUser,

            	},
            	cache: false,
            	success: function(data) {
          	
          			if(data == "complete"){
          			Reload();
            		}
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });

        ///

        $("body").on('click','.likeCom',function() {

        	var idComment = $(this).parent().find('input').val();

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

        	$(this).hide();

            $.ajax({
            	type:'POST',
            	url:'{{route('likeComment')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idComment: idComment,
            		idUser: idUser,
            	},
            	cache: false,
            	success: function(data) {
          	
          			if(data == "complete"){
          			Reload();
            		}
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });




        });

		///

      $("#repDesign").click(function() {

        var idDesign = {{request()->route('id')}};

        var idReason = $("select[name=reasonRep]").val();

        $("#repDesign").hide();

        $("select[name=reasonRep]").hide();

        $.ajax({
              type:'POST',
              url:'{{route('reportDesign')}}',
              async : true,
              data:{
                _token: '{{csrf_token()}}',
                idDesign: idDesign,
                idReason: idReason
              },
              cache: false,
              success: function(data) {
                if(data == "ok"){
                alert("Reporte exitoso");

              }

              },
               fail: function(xhr, textStatus, errorThrown){
              alert('request failed');
          }

            });

      });

    ///


      

    ///
	});






</script>


@endsection