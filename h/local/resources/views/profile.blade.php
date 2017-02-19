@extends('layouts/app')
@section('content')
   <div class="row">
   	  <div class="panel panel-success">
         <div class="panel-heading text-center">
              <h3 style="color:red;font-weight:bold;"> Xin chào {{Auth::user()->name}}.Đây là hồ sơ cá nhân của bạn
         </div>
          @if(Session::has('message'))
             <div class="alert alert-success text-center">
               {{Session::get('message')}}
             </div>
          @endif
         <div class="panel-body">
             <p style="font-weight:bold;">Họ Tên: {{Auth::user()->name}}</p>
             <p style="font-weight:bold;">Tên Tài Khoản: {{Auth::user()->username}}</p>
             <p style="font-weight:bold;">Email : {{Auth::user()->email}}</p>
             <p style="font-weight:bold;">Điện Thoại: </p>
             <p style="font-weight:bold;">Địa Chỉ: </p>
             <p style="font-weight:bold;">Thời Gian Tạo : {{Auth::user()->created_at}}</p>
             <p>Nếu bạn muốn thay đổi thông tin <a href="{{url('update-profile',Auth::user()->id)}}" style="color:green;font-weight:bold;"> tại đây</a></p>
        </div>
   </div> 
   </div>  
@endsection()