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
    <a class="btn btn-success my-2 my-sm-0" href="{{url('/')}}">Belimbing</a>
    {{--</a>--}}
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Trending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Friends</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Uploads</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-success my-2 my-sm-0" href="#">LOGIN</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
        <a class="nav-link" href="#">Avenger</a>
        <a class="nav-link" href="#">
            Nokia
        </a>
        <a class="nav-link" href="#">Black Phanter</a>
        <a class="nav-link" href="#">Warteg</a>
        <a class="nav-link" href="#">Warkop</a>
        <a class="nav-link" href="#">Kasino</a>
        <a class="nav-link" href="#">Internet</a>
        <a class="nav-link" href="#">Indihome</a>
        <a class="nav-link" href="#">Jokowi</a>
    </nav>
</div>


<main role="main" class="container">
    <div class="row">
        <div class="col-lg-9">

            @foreach($posts as $thepost)
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="pb-3 mb-0 border-bottom border-gray">
                            <a href="#" style="text-decoration: none;">
                                <strong>
                                    @foreach($users as $theuser)
                                        @if($theuser->id == $thepost->user_id)
                                            {{ $theuser->name }}
                                        @endif
                                    @endforeach
                                </strong>
                                <br>
                                <h1>
                                    {{ $thepost->title }}
                                </h1>
                            </a>
                            <div class="text-right">
                                <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
                                    Keren
                                    <span class="badge badge-pill align-text-bottom">{{ $thepost->up_vote }}</span>
                                </a>
                                <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
                                    B Aja
                                    <span class="nampak badge badge-pill align-text-bottom">
                                        {{ $thepost->down_vote }}
                                    </span>
                                </a>
                                <a class="btn btn-lg btn-outline-dark my-2 my-sm-0" href="#">Jawab!</a>
                            </div>
                        </div>
                    </div>


                    <div class="media text-muted pt-3 col-lg-6">

                        @foreach($comments as $thecomment)
                            @if($thecomment->post_id == $thepost->id)
                        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                        <strong class="d-block text-gray-dark">
                            @foreach($users as $theuser)
                                @if($theuser->id == $thecomment->user_id)
                                    {{ $theuser->name }}
                                @endif
                            @endforeach
                        </strong>

                                    {{ $thecomment->body }}
                        <br>

                        <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
                            Keren
                            <span class="badge badge-pill align-text-bottom">
                                {{ $thecomment->up_vote }}
                            </span>
                        </a>
                        <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
                            B Aja
                            <span class="nampak badge badge-pill align-text-bottom">
                                    {{ $thecomment->down_vote }}
                                </span>
                        </a>
                                @break
                            @endif
                        @endforeach
                        </p>
                    </div>

                    <small class="d-block text-right mt-3">
                        <a href="#">Lihat semua jawaban</a>
                    </small>

                </div>
            @endforeach





            <button type="button" class="btn btn-primary btn-lg btn-block">Lihat Pertanyaan Lebih..</button>
        </div>

        <div class="col-lg-3">
            {{-- kolom di kanan --}}
            <div>
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">TOP ASK-ER</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Luthfi Abdurrahim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@luthviar</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Afiq Rasyid M.</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@afiqrasyidm</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">M Luqman Hakim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@mluqmanhak</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">TOP ANSWER-ER</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Luthfi Abdurrahim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@luthviar</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Afiq Rasyid M.</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@afiqrasyidm</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">M Luqman Hakim</strong>
                                <a href="#">Follow</a>
                            </div>
                            <span class="d-block">@mluqmanhak</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <p class="small">
                        "Orang yang malu bertanya, akan SESAT di jalan" -anonim
                    </p>
                    <p class="small">
                        So, mari kita berbagi pertanyaan dan jawaban!
                    </p>
                    <p class="small">
                        This is just for sharing only. The First Indonesian Asking and Answering Community.
                    </p>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <p class="small">
                        <a href="#">About</a> -
                        <a href="#"> Terms</a> -
                        <a href="#">Privacy</a> -
                        <a href="#">Disclaimer</a> -
                        <a href="#">Advertise</a>
                    </p>
                </div>

            </div>

        </div>
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
