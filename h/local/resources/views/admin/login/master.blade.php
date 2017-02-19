<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ url('admin/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/style-responsive.css') }}" rel="stylesheet" />
    <script src="{{ url('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <style>
        .error{color:red;}
    </style>
</head>
 <body>
    @yield('content')
 </body>
 <script>
     $(function(){
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
                   required : "Email không được để trống",
                   email : "Email không đúng định dạng"
                },
                password : {
                    required : "Mật khẩu không được để trống",
                    minlength : "Mật khẩu phải ít nhất 8 ký tự"
                }
            }
        });
     });
 </script>
</html>