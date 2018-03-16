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
  
<br>
<div class="alert alert-warning">
	<h4>Hai {{ Auth::user()->name }}, tunjukkan pada kami pertanyaan terbaikmu!</h4>
</div>

<div class="row">
    <div class="col-lg-12">
    	<div class="my-3 p-3 bg-white rounded box-shadow">
		
			<form class="form-horizontal" method="post" action="" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					
						
						
					<div class="form-group">
						<label>Tuliskan pertanyaan anda, bisa dimulai dari apa, kapan, dimana, kenapa, bagaimana, dan lain-lain.</label>
						<textarea  pattern=".{18,}"  required title="Minimal 18 Karakter" type="text" class="form-control" name="title" placeholder="Contoh: Kenapa Belimbing warnanya kuning? "></textarea> 
					</div>
				    	
					<div class="form-group">
						<label>Tambahkan deskripsi pendukung, baik gambar, text atau yang lainnya (opsional).</label>
						
						<textarea  id="summernote" name="body"></textarea>
						<script>
							$(document).ready(function() {
								$('#summernote').summernote();
							});
						</script>
	                </div>    
					
					<button align="center" type="submit" class="btn success" style="color:black; background-color: orange;display: block; margin-right: auto; margin-left: auto;">Simpan Pertanyaan</button>
					
			</form>	
					
		</div>
		
    </div>

 </div>

      


@endsection