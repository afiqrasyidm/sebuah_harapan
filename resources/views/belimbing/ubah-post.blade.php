@extends('layouts.app')
@section('content')

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
 
       <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
		
		<style>
      .popover-content, .note-children-container{
			display: none;
			
	  }
	  
    </style>
  
  
<div class="alert alert-warning">
  <h4>Hai {{ Auth::user()->name }}, tunjukkan pada kami pertanyaanmu!</h4>
</div>

<div class="row">
        <div class="col-lg-12">
		
		<form class="form-horizontal" method="post" action="" role="form">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<br>
				<br>
				
		
				<label>Silahkan pertanyaan anda, bisa dimulai dari apa, kapan, dimana, kenapa, bagaimana, dan lain-lain</label>
					<br>
					
				 <div class="form-group">
					<input  pattern=".{18,}"  required title="Minimal 18 Karakter" type="text" class="form-control" value = "{{ $post->title }}" name="title"> 
				  </div>
			    	
				<br><br>
				<label>Silahkan tambahkan deskripsi pendukung, baik gambar atau text yang membuat kamu ingin bertanya mengenai hal ini!(optional)</label>
					<br>
					
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    
					<div class="media text-muted pt-3">
						
					
							<textarea  id="summernote" name="body" > </textarea >
										  <script>
											$(document).ready(function() {
												$('#summernote').summernote();
												$('#summernote').summernote('code', '{!! $post->body !!}');
											});
										  </script>
                      </div>
					<br>
					<br>
				
				
				</div>
				
				<button align="center" type="submit" name="ubah_final" value="ubah_final"  class="btn success" style="color:black; background-color: yellow;display: block; margin-right: auto; margin-left: auto;"  >Submit</button>
				
		</form>	
					<br>
					<br>
		
		
        </div>

 </div>

      


@endsection