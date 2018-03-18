@extends('layouts.app')

@section('content')

<style>
body, html {
    height: 100%;
    margin: 0;
    background-image: url("{{URL::asset('/image/back2.jpeg')}}");
    background-size: auto 100%;
}



#bg {
    /* The image used */
    

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<br>
<div id="bg"></div>
<div class="container"> 
        <div class="col-md-8 offset-md-2">
            <div class="my-5 p-4 bg-white rounded box-shadow">
                   

                    <div class="row justify-content-center">
                        <img class="img-responsive" src="{{URL::asset('/image/logo3.jpg')}}" alt="profile Pic">  
                    </div>

                    <div class="row justify-content-center">
                        <h6 class="p-2" style="text-align:center;">Disini tempat untuk berbagi ilmu, tawa, dan keingintahuan</h6>
                    </div>

                    <br>
                    <br>

                    
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h5>Log In</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" placeholder="e-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning">
                                        Log In
                                    </button>

                                    <a class="btn text-warning" href="{{ route('password.request') }}">
                                        Lupa password?
                                    </a>
                                    
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <p>Belum punya akun? <a href="{{ url('/register') }}" style="text-decoration:none;" class="text-warning"> Daftar disini</a></p>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                   
                    
           
        </div>
    </div>
</div>
@endsection
