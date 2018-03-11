@extends('layouts.app')
@section('content')
<div class="alert alert-warning">
  @if(null !=(Auth::check() ))
		<h4>Hai {{ Auth::user()->name }}, tunjukkan pada kami jawaban terbaikmu!</h4>
    @else
		<h4>Hai Belimbingers, tunjukkan pada kami jawaban terbaikmu!</h4>
	@endif

</div>



<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />
  
    <!-- Create a tag that we will use as the editable area. -->
    <!-- You can use a div tag as well. -->
   
 
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $(function() { $('.body_pertanyaan').froalaEditor() }); </script>

<div class="row">
        <div class="col-lg-12">
			    <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="pb-3 mb-0 border-bottom border-gray">
                            <a href="#" style="text-decoration: none;">
                                <strong>
                                            {{ $post->name }}
                                       
                                </strong>
                                <br>
                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </a>
								<p> di post pada: {{ $post->created_at }}</p>
							<div>
									{!! $post->body !!}
							  
							</div>
                           
                            <div class="text-right">
                                <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
                                    Menarik
                                    <span class="badge badge-pill align-text-bottom">{{ $post->up_vote }}</span>
                                </a>
                                <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
                                  Tidak Menarik
                                    <span class="nampak badge badge-pill align-text-bottom">
                                        {{ $post->down_vote }}
                                    </span>
                                </a>
                                
                            </div>
                            
                        </div>
                    </div>

                    <h3>Jawaban:</h3>
                    
					<form class="form-horizontal" method="post" action="" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<br>
								
							<div class="my-3 p-3 bg-white rounded box-shadow">
								
								<div class="media text-muted pt-3">
									
								
										<textarea required class="body_pertanyaan"  name="body" ></textarea>
								  </div>
								<br>
								<br>
							
							
							</div>
							
							<button align="center" type="submit"  class="btn btn-lg my-2 my-sm-0" style="color:black; background-color: yellow;display: block; margin-right: auto; margin-left: auto;"  >Submit</button>
							
					</form>	
					
					
					 
					
                       @foreach($comments as $comment)
                            <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
	                        <p class="media-body pb-3 mb-0 small lh-125 ">
		                        <strong class="d-block text-gray-dark">
		                                    {{ $comment->name }}
		                             
	
								</strong>
								<p> di komen pada: {{ $comment->created_at }}</p>
		                        <hr  size="30">
								</br>
									{!! $comment->body !!}
		                        </br>
		                   

		                        <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
		                            Menarik
		                            <span class="badge badge-pill align-text-bottom">
		                                {{ $comment->up_vote }}
		                            </span>
		                        </a>
		                        <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
		                           Tidak Menarik
		                            <span class="nampak badge badge-pill align-text-bottom">
		                                    {{ $comment->down_vote }}
		                            </span>
		                        </a>
		                    </p>

                        @endforeach
                        
                    

                    

                </div>            

        </div>

      

        
    </div>


@endsection