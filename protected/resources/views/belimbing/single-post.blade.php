@extends('layouts.app')
@section('content')

<br>
<div class="alert alert-warning">
  	@if(null !=(Auth::check() ))
		<h4>Hai {{ Auth::user()->name }}, tunjukkan pada kami jawaban terbaikmu!</h4>
  	@else
		<h4>Hai Belimbingers, tunjukkan pada kami jawaban terbaikmu!</h4>
	@endif

</div>

<style>
      .popover-content, .note-children-container{
			display: none;
			
	  }
	  
</style>





<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">



<!-- Create a tag that we will use as the editable area. -->
<!-- You can use a div tag as well. -->


<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>


<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

<!-- share to line -->
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
	
        <div class="col-md-12">
			    <div class="my-3 p-3 bg-white rounded box-shadow">
				
						<div  class="float-right">
							
										<form class="form-horizontal" method="post" action="" role="form">
										
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											
													
													@if($post_likes_flag_user != NULL )
														<input type="button" id= "upvote"  value = "Liked  {{$post_likes_count}} " name="upvote"   class="up_vote btn btn-sm btn-outline-success my-2 my-sm-0" href="#"/>
														
														<input type="button" id= "flag_user_like"  hidden value = "1" name="upvote"   class=" btn btn-sm btn-outline-success my-2 my-sm-0" href="#"/>
													@else
														<input type="button" id= "upvote"  value = "Like? {{$post_likes_count}}" name="upvote"   class="up_vote btn btn-sm btn-outline-success my-2 my-sm-0" href="#"/>
												
														<input type="button" id= "flag_user_like"  hidden value = "0" name="upvote"   class=" btn btn-sm btn-outline-success my-2 my-sm-0" href="#"/>
														
													@endif
														
										</form>	
										
						</div>
                    <div class="media text-muted pt-3">
                        <div class="pb-3 mb-0">
                                
								
								
								
								
								
								
								
								
								
                                <h6>{{ $post->name }} </h6>
                                
                                <h4 style="color:black;">{{ $post->title }}</h4>
								
								
								
								
								
																
								<p style="font-size:small; font-style: italic;">{{ $post->created_at }}</p>

								<div style="color:black;">
										{!! $post->body !!}
								  
								</div>

								<br>
								<br>
								<div class="line-it-button" data-lang="en" data-type="share-a" data-url="http://belimbing.me/post/{{ $post->id }}" style="display: none;"></div>
								<br>
								<a href="whatsapp://send?text={{ $post->title }} Jawab disini http://belimbing.me/post/{{ $post->id }}" data-action="share/whatsapp/share" style="text-decoration:none; color:green;"><span class="badge badge-success">Share via Whatsapp</span></a>
								<br>
								
								@if (null !=(Auth::check() ) &&  Auth::user()->id == $post->user_id )
									<br>
									<div class="text-left"    >
								
										<form class="form-horizontal" method="post" action="" role="form">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button  type="submit" name="ubah"  value="ubah" class="btn btn-outline-warning my-2 my-sm-0">Ubah Pertanyaan</button>
										
											<button  type="submit" name="hapus"  value="hapus" class="btn btn-outline-danger my-2 my-sm-0">Hapus Pertanyaan</button>
												
										</form>	
	
									</div>
								@endif
								
								<br>
								
									
								
				

                        </div>
						
						
                    </div>
										
					<div class="row">
		                <div class="col-md-12">

							<form class="form-horizontal" method="post" action="" role="form">
									
									@if (Auth::check())
										
										<h4>Jawab sebagai:</h4>
										<div class="col-md-4">
											<select name="is_anonim" class="form-control"> 
											  <option value="0">{{ Auth::user()->name }}</option>
											  <option value="1">Anonim</option>
											</select>
											
										</div>
										<br>
									@else
										<h4>Jawab sebagai <strong>anonim</strong>: </h4>
									@endif
																

									<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
									<div>
										<textarea  id="summernote" name="body"></textarea >
										
										<br>

										<button align="center" value="comment" type="submit" name="comment" class="btn btn-lg btn-block my-2 my-sm-0" style="color:black; background-color: orange;display: block; margin-right: auto; margin-left: auto;">Simpan Jawaban</button>
									</div>
										
							</form>

						</div>
					</div>
					 

					<!-- Jawaban dari pertanyaan -->
					<br>
					<h4>Jawaban: </h4>
					<br>
                       @foreach($comments as $comment)
							<div class="row">
								<div class="col-md-12">
									
									<h5>	
										@if ($comment->is_anonim == 0)
			                                    {{ $comment->name }}
			                            @else
												Anonim
										@endif				
									</h5>
									<p style="font-size:small; font-style: italic;"> answered on {{ $comment->created_at }}</p>
			                        <p> {!! $comment->body !!} </p>

									<hr  size="30"/>

								</div>
							</div>
                        @endforeach

				</div>
		</div>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	<script>
        $(document).ready(function() {
            $('#summernote').summernote({

                height: 100

            });
        });
	</script>
	
	
	<script > 

    $(function(){ 
       
        $(".up_vote").on('click', function(){ 
            
			var value = $( "#flag_user_like" ).val();
			
			//action yang harus dilakukan kalau 0 delete dan berarti udah pernah like, 1 insert belum like
			var action = 1; 
		//	alert(value);
			if(value == 1){
				action = 0;
			}
			
			//alert (value);
			
			
			//alert("Hello! I am an alert box!");
            $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
			//alert(AuthUser);
			if("" === AuthUser ){
				window.location.href = '../login'; 
			}
			
			
			
            $.ajax({ 
				
				 
				
				method: 'POST', // Type of response and matches what we said in the route
				url: 'upvote', // This is the url we gave in the route
				data: {
					'_token': $('input[name="_token"]').val(),
					'up_vote': true,
					'action' :action,
					'post_id':  {{$post->id}},
				},
				 // a JSON object to send back
				success: function(response){ // What to do if we succeed
					console.log(response);

					if(action == 0) {
						$('#flag_user_like').val(0);
						$('.up_vote').val("Like? " + response.post_likes_count);
					}
					else{
						$('#flag_user_like').val(1);
						$('.up_vote').val("Liked " + response.post_likes_count);
					}
					
				},
				error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					//alert("");
				}
				
				 
   
          });
 
       });
	   
	});

    </script> 
	
	
	

</div>
@endsection
