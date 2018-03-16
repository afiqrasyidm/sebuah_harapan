@extends('layouts.app')
@section('content')
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


<div class="row">
	

	
	
        <div class="col-lg-12">
			    <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="pb-3 mb-0 border-bottom border-gray">
                                <strong>
                                            Posted by: {{ $post->name }}
                                       
                                </strong>
                                <br>
								  <br>
                                <h1 
									style="color:black;">
                                    {{ $post->title }}
                                </h1>
								
								
								
								<p> Oleh {{ $post->created_at }}</p>
								
								@if (null !=(Auth::check() ) &&  Auth::user()->id == $post->user_id )
								<div class="text-left">
							
									<form class="form-horizontal" method="post" action="" role="form">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button  type="submit" name="ubah"  value="ubah" class="btn btn-outline-warning my-2 my-sm-0">Ubah</button>
									
										<button  type="submit" name="hapus"  value="hapus" class="btn btn-outline-danger my-2 my-sm-0">Hapus</button>
											
									</form>	
					
					
								</div>
								
								
								@endif
								  <br>
								    <br>
								<div style="color:black;">
										{!! $post->body !!}
								  
								</div>
								
						
                            
                        </div>
                    </div>
					<br>
					<br>

					
		
					<form class="form-horizontal" method="post" action="" role="form">
					
					<div class="row">
						<div class="col-lg-4">

						@if (null ==(Auth::check() ) )
							<h3>Jawab sebagai <strong>anonim:</strong></h3>
					
						@else
							<h3>Jawab: </h3>
							<br>
							
							 <label for="sel1">Sebagai:</label>
							 <br>
							<select name="is_anonim" class="form-control"> 
							  <option value="0">{{ Auth::user()->name }}</option>
							  <option value="1">Anonim</option>
							</select>
													
						@endif
						</div>
					</div>
					<div class="row">
                    <div class="col-lg-12">

					

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<br>
								
							<div class="my-3 p-3 bg-white rounded box-shadow">
										  <textarea  id="summernote" name="body"></textarea >
								<br>
								<br>

								<button align="center"  value="comment" type="submit" name="comment" class="btn btn-lg btn-block my-2 my-sm-0" style="color:black; background-color: yellow;display: block; margin-right: auto; margin-left: auto;"  >Submit</button>
							</div>
							
					</form>

					</div>
					</div>
					 


                       @foreach($comments as $comment)
						<div class="row">
							<div class="col-lg-9">

								<div class="my-3 p-3 bg-white rounded box-shadow">

                            <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
	                        <p class="media-body pb-3 mb-0 small lh-125 ">
		                        <strong class="d-block text-gray-dark">
								
									@if ( $comment->is_anonim == 0  )
		                                    {{ $comment->name }}
		                            @else
											Anonim
									@endif	
										
								</strong>
								<p> di komen pada: {{ $comment->created_at }}</p>
		                        <hr  size="30"/>
								<br>
									{!! $comment->body !!}
		                        <br>


		                    </p>

								</div>
							</div>
						</div>
                        @endforeach

				</div>
		</div>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	<script>
        $(document).ready(function() {
            $('#summernote').summernote({

                height: 150

            });
        });
	</script>

</div>
@endsection
