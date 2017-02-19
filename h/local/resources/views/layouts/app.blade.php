<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/shop-homepage.css') }}" rel="stylesheet">
    <script src="{{ url('js/flash.js')}}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        .error{color:red;}
        #group{padding-bottom: 50px;}
    </style>
</head>
<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=211859729276400";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Book Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('/home')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}">Contact</a>
                    </li>
                    <li>
                        <a href="{{url('admin/login')}}" target="blanks">Admin</a>
                    </li>  
                    <li>
                       <form class="navbar-form">
                         <input class="form-control" placeholder="Search" type="text">
                       </form>  
                    </li>       
                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Hello {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <a href="{{ url('/profile')}}">
                                            Profile
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
           <div class="row">
             <div class="col-md-3">
               @include('blanks.sidebar')
             </div>
             <div class="col-md-9">
                @include('blanks.slider')

                @yield('content')
             </div>  
          </div>
              <div class="fb-like" data-href="http://localhost:81/bookstore" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
              
              <div class="fb-comments" data-href="http://localhost:81/bookstore" data-numposts="5"></div>
        </div>  
        @include('blanks.footer')

    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script>
    $(function() {

        $('#form-login').validate({
            rules : {
                email : {
                    required : true,
                    email : true,
                },
                password : {
                    required : true,
                    minlength : 8
                }
            },
            messages : {
                email : {
                    required : "Email không được đế trống",
                    email : "Email không đúng định dang",
                },
                password : {
                    required : "Bạn chưa nhập mật khẩu",
                    minlength : "Mật khẩu phải ít nhất 8 ký tự",
                },
            },
            submitHandler : function(){
            $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
            });
          $.ajax({
             'url' :'login',
             'data' : {
                'email' : $('#email').val(),
                'password' : $('#password').val()
             },
             'type' : 'POST',
              success : function (data){
                console.log(data);
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.email !=undefined){
                        $(".errorEmail").show().text(data.message.email[0]);
                    }
                    if(data.message.password !=undefined){
                        $(".errorPassword").show().text(data.message.password[0]);
                    }
                    if(data.message.errorlogin != undefined){
                        $(".errorlogin").show().text(data.message.errorlogin[0]);
                    }
                }else{
                    window.location.href="http://localhost:81/bookstore/public/home";
                }
              }
          });
          }
        });

        //register
        $('#form-register').validate({
            rules : {
                name :{
                    required : true,
                },
                username : {
                    required : true,
                },
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 8
                },
                password_confirmation : {
                    equalTo : "#password"
                }
            },
            messages : {
                name : {
                    required : "Bạn chưa nhập tên"
                },
                username : {
                    required : "Bạn chưa nhập tên tài khoản",
                },
                email : {
                    required : "Bạn chưa nhập email",
                    email : "Emai không đúng định dạng"
                },
                password : {
                    required : "Bạn chưa nhập mật khẩu",
                    minlength : "Mật khẩu phải ít nhất 8 ký tự"
                },
                password_confirmation : {
                    equalTo : "Mật khẩu xác nhận không chính xác"
                }
            },    
        });

        //update profile
        $('#form-updateProfile').validate({
            rules : {
                name :{
                    required : true,
                },
                username : {
                    required : true,
                },
                email : {
                    required : true,
                    email : true
                },
                password : {
                    minlength : 8
                },
                password_confirmation : {
                    equalTo : "#password"
                }
            },
            messages : {
                name : {
                    required : "Bạn chưa nhập tên"
                },
                username : {
                    required : "Bạn chưa nhập tên tài khoản",
                },
                email : {
                    required : "Bạn chưa nhập email",
                    email : "Emai không đúng định dạng"
                },
                password : {
                    minlength : "Mật khẩu phải ít nhất 8 ký tự"
                },
                password_confirmation : {
                    equalTo : "Mật khẩu xác nhận không chính xác"
                }
            },    
        });
    });
</script>
</body>
</html>
