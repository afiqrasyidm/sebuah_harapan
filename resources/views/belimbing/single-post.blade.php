@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col-lg-9">
			    <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="pb-3 mb-0 border-bottom border-gray">
                            <a href="#" style="text-decoration: none;">
                                <strong>
                                    @foreach($users as $user)
                                        @if($user->id == $post->user_id)
                                            {{ $user->name }}
                                        @endif
                                    @endforeach
                                </strong>
                                <br>
                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </a>
                            <div class="text-left">
                                <a class="btn btn-lg btn-outline-dark my-2 my-sm-0" href="#">Jawab</a>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
                                    Keren
                                    <span class="badge badge-pill align-text-bottom">{{ $post->up_vote }}</span>
                                </a>
                                <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
                                    Biasa aja
                                    <span class="nampak badge badge-pill align-text-bottom">
                                        {{ $post->down_vote }}
                                    </span>
                                </a>
                                
                            </div>
                            
                        </div>
                    </div>

                    <h3>Jawaban:</h3>
                    
                       @foreach($comments as $comment)
                            <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
	                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		                        <strong class="d-block text-gray-dark">
		                            @foreach($users as $user)
		                                @if($user->id == $comment->user_id)
		                                    {{ $user->name }}
		                                @endif
		                            @endforeach
		                        </strong>
		                        </br>
		                        {{ $comment->body }}
		                        </br>
		                        <br>

		                        <a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">
		                            Keren
		                            <span class="badge badge-pill align-text-bottom">
		                                {{ $comment->up_vote }}
		                            </span>
		                        </a>
		                        <a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">
		                            Biasa aja
		                            <span class="nampak badge badge-pill align-text-bottom">
		                                    {{ $comment->down_vote }}
		                            </span>
		                        </a>
		                    </p>
                        @endforeach
                        
                    

                    <small class="d-block text-right mt-3">
                        <a href="#">Lihat semua jawaban</a>
                    </small>

                </div>            

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


@endsection