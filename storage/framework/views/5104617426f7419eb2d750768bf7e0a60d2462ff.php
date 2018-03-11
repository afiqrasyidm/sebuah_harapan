<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">

    <title>Belimbing</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/offcanvas.css')); ?>" rel="stylesheet">
	 
    <style>
      .offcanvas-collapse{
			background-color:white;
			
	  }
	  .navbar-collapse{
		margin-right: auto; margin-left: auto;
	  }
	  
	    .navbar-toggler-icon {
		  background-image: url("https://openclipart.org/image/2400px/svg_to_png/221605/menu-icon.png");
		}
    </style>
	
<script src="<?php echo e(asset('js/jquery-3.2.1.slim.min.js')); ?>"></script>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-md fixed-top navbar-white bg-white">
	
	
	
    
    <a class="btn my-2 my-sm-0" href="<?php echo e(url('/home')); ?>">
		<img src="<?php echo e(URL::asset('/image/logo.JPG')); ?>" alt="profile Pic" height="45" width="160">
	
		
		</a>
    
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" style="color:black;">
        <ul class="navbar-nav mr-auto">
            <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item active"> 
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				style="color:black; margin-left:10px;"  class="nav-link" href="<?php echo e(url('/')); ?>">Beranda<span class="sr-only">(current)</span></a>
            </li>
         
			
           
            <li class="nav-item">
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				style="color:black;" class="btn btn-outline-warning my-2 my-sm-0" href="<?php echo e(url('/login')); ?>">Masuk</a>
            </li>
            <li class="nav-item">
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				style="color:black;" class="btn btn-outline-warning my-2 my-sm-0" href="<?php echo e(url('/register')); ?>">Daftar</a>

            </li>
            <?php else: ?>
               
                <li class="nav-item ">
                    <a 
					
					 onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					
					style="color:black;"  class="nav-link" href="<?php echo e(url('/home')); ?>">Beranda <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					style="color:black;" class="nav-link" href="<?php echo e(url('/myquestion')); ?>">Pertanyaan saya </a>
                </li>
               
                <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					style="color:black;" class="nav-link" href="<?php echo e(url('/ask')); ?>">Tambah Pertanyaan </a>
                </li>
				
                
                 <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					class="btn btn-outline-warning my-2 my-sm-0" href="<?php echo e(url('/logout')); ?>">Keluar</a>
                </li>
               
                
            <?php endif; ?>
			
        </ul>
       
    </div>
	
	
</nav>
<br>
<br>
       
               

<main role="main" class="container">
    <div class="row">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>
    
 <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="<?php echo e(asset('js/jquery-3.2.1.slim.min.js')); ?>"><\/script>')</script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/holder.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/offcanvas.js')); ?>"></script>
</body>
</html>
