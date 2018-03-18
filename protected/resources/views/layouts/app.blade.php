<!doctype html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115604901-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115604901-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Belimbing</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
	 
    <style>
      .offcanvas-collapse{
			margin-top:30px;
			background-color:white;
			
	  }
	  .navbar-collapse{
		margin-right: auto; margin-left: auto;
		text-align: center;
	  }
	  
	  
	    .navbar-toggler-icon {
		  background-image: url("https://openclipart.org/image/2400px/svg_to_png/221605/menu-icon.png");
		}
    </style>
	
<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-md fixed-top navbar-white bg-white">
	
	
	<!-- logo -->
    <a class="navbar-brand" href="{{ url('/') }}">
        <img class="img-responsive" src="{{URL::asset('/image/logo2.jpg')}}" alt="profile Pic">
    </a>
   
   <!-- tombol menu untuk mobile view -->
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" style="color:black;  font-size: large;">
        <ul class="navbar-nav mr-auto">
			 <li class="nav-item">
                    <a 
					
					 onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					
					style="color:black;"  class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
			<li class="nav-item"> 
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				style="color:black; margin-left:10px;"  class="nav-link" href="{{ url('/new') }}">Pertanyaan Terbaru<span class="sr-only">(current)</span></a>
            </li>
				
            @guest
            
			
           
            <li class="nav-item">
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				class="btn btn-outline-warning my-2 my-sm-0" style="color:black; " href="{{ url('/login') }}">Log In</a>
            </li>
            <li class="nav-item">
                <a 
				onMouseOver="this.style.color='#878686'"
				onMouseOut="this.style.color='black'" 
				style="color:black; " class="btn btn-outline-warning my-2 my-sm-0" href="{{ url('/register') }}">Register</a>

            </li>
            @else
               
               
                <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					style="color:black;" class="nav-link" href="{{ url('/myquestion') }}">Pertanyaan Saya</a>
                </li>
               
                <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					style="color:black;" class="nav-link" href="{{ url('/ask') }}">Tambah Pertanyaan</a>
                </li>
				
                
                 <li class="nav-item">
                    <a 
					onMouseOver="this.style.color='#878686'"
					onMouseOut="this.style.color='black'" 
					class="btn btn-outline-warning my-2 my-sm-0" style="color:black; " href="{{ url('/logout') }}">Log Out</a>
                </li>
               
                
            @endguest
			
        </ul>
       
    </div>
</nav>

</br>

<main role="main" class="container">
   
   @yield('content')
   
</main>
    
 <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/holder.min.js') }}"></script>--}}
<script src="{{ asset('js/offcanvas.js') }}"></script>
</body>
</html>
