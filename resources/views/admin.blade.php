@extends('base')

@section('title')
Moderacion - Recircuit
@endsection

@section('content')

<div class="container my-5">
	<div class="card">
		<div class="card-header cst-blue-bg wht-text bold"><p class="text-sub-1">Reportes de diseño</p></div>

		<div class="card-body" id="reportHolder">
					
		<img class="mx-auto d-block" src="{{asset('imgs/loading2.gif')}}">



		</div>

	</div>



</div>

@endsection

@section('scripts')

<script type="text/javascript">
	
	$(document).ready(function() {

		reload();

		$("body").on('click','.dRep', function() {



        	var idReport = $(this).parent().find('input[name="idRep"]').val();

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

        	$(this).hide();

        	$(this).parent().find('.dDes').hide();

      

            $.ajax({
            	type:'POST',
            	url:'{{route('deleteReport')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idReport: idReport
            	},
            	cache: false,
            	success: function(data) {
          	
          			if(data == "ok"){
          			reload();
            		}
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });

		$("body").on('click','.dDes', function() {

        	var idDesign = $(this).parent().find('input[name="idDes"]').val();

        	@auth
        	var idUser = {{auth()->user()->id}} ;
        	@endauth

        	$(this).hide();

        	$(this).parent().find('.dRep').hide();

        	

            $.ajax({
            	type:'POST',
            	url:'{{route('deleteDesign')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}',
            		idDesign: idDesign
            	},
            	cache: false,
            	success: function(data) {
          	
          			if(data == "ok"){
          			reload();
            		}
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


        });




		///

		function reload() {

			$("#reportHolder").empty();
			// body...
			$("#reportHolder").append("<img class='mx-auto d-block' src='{{asset('imgs/loading2.gif')}}'>");


    	$.ajax({
            	type:'POST',
            	url:'{{route('getReports')}}',
            	async : true,
            	data:{
            		_token: '{{csrf_token()}}'
            	},
            	cache: false,
            	success: function(data) {

          			$("#reportHolder").empty();

          			var counter = 0;
          			

          			data.forEach(function(element) {
  

          			
          				$("#reportHolder").append(

          					element

          					);
          			
          			counter++;

          			});

          			

          			if(counter == 0){
          			$("#reportHolder").append("<p class='mt-3 mb-3 ml-5 text-sub-2'> No hay reportes </p>");
          			}else{

       
          			}
            	
            	},
            	 fail: function(xhr, textStatus, errorThrown){
       				alert('request failed');
   				}

            });


		}




		///
	});




</script>

@endsection