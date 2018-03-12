@extends('layouts.app')
@section('content')



<div class="row">
        <div class="col-lg-12">

          

            @foreach($posts as $thepost)
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="media text-muted pt-3">
                        
                        <div class="pb-3 mb-0">
                            <a href="{{ route('show.single.post', ['id' => $thepost->id]) }}" 
							onMouseOver="this.style.color='#878686'"
							onMouseOut="this.style.color='black'" 
							
							style="text-decoration: none;color:black;">
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

      
    </div>

@endsection



