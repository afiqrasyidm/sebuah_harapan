<!doctype html>
<html lang="en">
<head>
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
        nampak:hover {
            color: black;
        }
    </style>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
    <a class="btn btn-success my-2 my-sm-0" href="{{url('/home')}}">Belimbing</a>
    {{--</a>--}}
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Beranda<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pertanyaan Populer</a>
            </li>
           
            <li class="nav-item">
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/login') }}">Masuk</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/register') }}">Daftar</a>
            </li>
            @else
               
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">Beranda <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/myquestion') }}">Pertanyaan saya </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ask') }}">Tambah Pertanyaan </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/answer') }}">Jawab Pertanyaan </a>
                </li>

                 <li class="nav-item">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/logout') }}">Keluar</a>
                </li>
               
                
            @endguest
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
       
               

<main role="main" class="container">
    <div class="row">
        @yield('content')
    </div>
</main>
    
 <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/holder.min.js') }}"></script>
<script src="{{ asset('js/offcanvas.js') }}"></script>
</body>
</html>
