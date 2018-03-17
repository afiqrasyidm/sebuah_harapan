@extends('layouts.app')
@section('content')



<div class="row">
        <div class="col-lg-9">

          

            @foreach($posts as $thepost)
                <div class="my-3 p-3 bg-white rounded box-shadow">
					<div  class="float-right">
						<p style="font-size:small; font-color: Times;"> disukai oleh: {{ $thepost->count_like }}</p>
                        
					</div>
                    <div class="media text-muted pt-3">
                        
                        <div class="pb-3 mb-0">
                            <h6>{{ $thepost->name }} </h6>
                            <a href="{{ route('show.single.post', ['id' => $thepost->id]) }}" onMouseOver="this.style.color='#878686'" onMouseOut="this.style.color='black'" style="text-decoration: none; color:black;">
                                <h4> {{ $thepost->title }} </h4>
                            </a>

							<p style="font-size:small; font-style: italic;">{{ $thepost->created_at }}</p>
							
						    <div class="text-left">
                                <a class="btn btn-md btn-outline-dark my-2 my-sm-0" href="{{ route('show.single.post', ['id' => $thepost->id]) }}">Jawab</a>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="media text-muted pt-3">

                        @foreach($comments as $thecomment)
                            @if($thecomment->post_id == $thepost->id)
                                
                                <p>
                                   {!! strip_tags(str_limit($thecomment->body, $limit = 200, $end = '...')) !!}
                                </p>
                                   
                                        {{--<a class="btn btn-sm btn-outline-success my-2 my-sm-0" href="#">--}}
                                            {{--Keren--}}
                                            {{--<span class="badge badge-pill align-text-bottom">--}}
                                        {{--{{ $thecomment->up_vote }}--}}
                                         {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<a class="btn btn-sm btn-outline-info my-2 my-sm-0" href="#">--}}
                                            {{--B Aja--}}
                                            {{--<span class="nampak badge badge-pill align-text-bottom">--}}
                                        {{--{{ $thecomment->down_vote }}--}}
                                         {{--</span>--}}
                                        {{--</a>--}}
                                @break
                            @endif
                        @endforeach
                                
                    </div>

                    {{--<small class="d-block text-right mt-3">--}}
                        {{--<a href="#">Lihat semua jawaban</a>--}}
                    {{--</small>--}}

                </div>
            @endforeach

            <!-- Pagination -->
            <div style="text-decoration:none; color: orange;">
                {{ $posts->links() }}
            </div>

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
                       Belimbing. Tanya apapun disini!
                    </p>
					
					<p class="small">
                        This is just for sharing only. The first Indonesian question answer community.
                    </p>
                </div>

               


            </div>

        </div>
    </div>

@endsection



