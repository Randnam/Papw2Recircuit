@extends('base')

@section('content')

<div class="container my-5">
	<div class="card">
		<div class="card-header cst-blue-bg wht-text bold"><p class="text-sub-1">Reportes de diseño</p></div>

		<div class="card-body" id="reportHolder">
					




		</div>

	</div>



</div>

@endsection

@section('scripts')

<script type="text/javascript">
	
	$(document).ready(function() {

		reload();






		///

		function reload() {
			// body...

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