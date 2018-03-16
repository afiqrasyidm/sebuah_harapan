<?php $__env->startSection('content'); ?>

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

<div class="alert alert-warning">
  <h4>Hai <?php echo e(Auth::user()->name); ?>, tunjukkan pada kami pertanyaanmu!</h4>
</div>

<div class="row">
        <div class="col-lg-12">
		
		<form class="form-horizontal" method="post" action="" role="form">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

				<br>
				<br>
				
		
				<label>Silahkan pertanyaan anda, bisa dimulai dari apa, kapan, dimana, kenapa, bagaimana, dan lain-lain</label>
					<br>
					
				 <div class="form-group">
					<input  pattern=".{18,}"  required title="Minimal 18 Karakter" type="text" class="form-control" name="title" placeholder="Contoh: Kenapa Belimbing warnanya kuning? " > 
				  </div>
			    	
				<br><br>
				<label>Silahkan tambahkan deskripsi pendukung, baik gambar atau text yang membuat kamu ingin bertanya mengenai hal ini!(optional)</label>
					<br>
					
				<div class="my-3 p-3 bg-white rounded box-shadow">
                    
					<div class="media text-muted pt-3">
						
					
							<textarea class="body_pertanyaan"  name="body" ></textarea>
                      </div>
					<br>
					<br>
				
				
				</div>
				
				<button align="center" type="submit"  class="btn success" style="color:black; background-color: yellow;display: block; margin-right: auto; margin-left: auto;"  >Submit</button>
				
		</form>	
					<br>
					<br>
		
		
        </div>

 </div>

      


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>