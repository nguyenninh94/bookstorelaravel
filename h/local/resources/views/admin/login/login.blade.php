@extends('admin.login.master')
@section('content')
  <body class="login-img3-body">
    <div class="container">
      <form class="login-form" action="{{url('admin/login')}}" id="form-login" method="POST">
        {{csrf_field()}}
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <p style="color:red;display:none" class="errorlogin"></p>  
            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}" >
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_key_alt"></i></span>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
   </div>
@endsection()   
