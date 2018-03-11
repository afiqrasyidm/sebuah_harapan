@extends('layouts.app')
@section('content')



<div class="row">
        <div class="col-lg-9">

          

            @foreach($posts as $thepost)
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        
                        <div class="pb-3 mb-0">
                            <a href="{{ route('show.single.post', ['id' => $thepost->id]) }}" style="text-decoration: none;">
                                <h1> {{ $thepost->title }} </h1>
                            </a>
							<p>oleh {{ $thepost->name }} pada {{ $thepost->created_at }}</p>
							
                            <div class="text-left">
                                <a class="btn btn-md btn-outline-dark my-2 my-sm-0" href="{{ route('show.single.post', ['id' => $thepost->id]) }}">Jawab</a>
                            </div>
                        </div>
                    </div> 
                </div>
            @endforeach



        </div>

        <div class="col-lg-3">
            {{-- kolom di kanan --}}
            <div>
                
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">SARAN & KRITIK</h6>
                    <div class="media text-muted pt-3">
                        
                        <p>Beritahu kami saran dan kritik Anda tentang Belimbing <a href="https://goo.gl/forms/0YDZ6p9j4yHNsM9b2" target="_blank">disini</a></p>
                        
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <p class="small">
                        "Orang yang malu bertanya, akan SESAT di jalan" -anonim
                    </p>
                    <p class="small">
                        So, mari kita berbagi pertanyaan dan jawaban!
                    </p>
                    <p class="small">
                        This is just for sharing only. The first Indonesian question answer community.
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



