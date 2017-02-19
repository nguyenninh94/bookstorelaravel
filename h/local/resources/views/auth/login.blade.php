@extends('layouts.app')

@section('content')
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Login</div>
         
                @include('partials.flash')

                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="form-login" method="POST" action="{{ url('/login') }}">
                      <p style="color:red;display:none" class="error errorlogin"></p>
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                <p style="color:red;display:none" class="error errorEmail"></p>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <p style="color:red;display:none" class="error errorPassword text-center"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" id="dang-nhap" class="btn btn-primary">
                                    Login
                                </button>       
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                        </div>        
                        <div class="form-group"> 
                            <div class="col-md-8 col-md-offset-4">       
                                <a class="btn btn-link" href="{{ url('facebook/redirect') }}">
                                    <img src="{{ url('images/face.png')}}" with="50px" height="50px">
                                </a>
                                <a class="btn btn-link" href="{{ url('google/redirect') }}">
                                    <img src="{{ url('images/google.jpg')}}" with="50px" height="50px">
                                </a> 
                                <a class="btn btn-link" href="{{ url('twitter/redirect') }}">
                                    <img src="{{ url('images/twitter.jpg')}}" with="50px" height="50px">
                                </a> 
                            </div>          
                        </div>
                    </form>
                </div>
            </div>

@endsection
