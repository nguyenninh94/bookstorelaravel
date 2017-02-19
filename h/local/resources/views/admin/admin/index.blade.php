@extends('admin.layouts.master')
@section('controller','Admin')
@section('action','Index')
@section('content')

                    <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>STT</th>
                                 <th><i class="icon_profile"></i>Name</th>
                                 <th><i class="icon_profile"></i>Username</th>
                                 <th><i class="icon_email"></i>Email</th>
                                 <th><i class="icon_profile"></i> Role</th>
                                 <th><i class="icon_calendar"></i>Create</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php $stt=0;?>
                              @foreach($admins as $admin)
                              <?php $stt++;?>
                              <tr>
                                 <td>{{$stt}}</td>
                                 <td>{{$admin->name}}</td>
                                 <td>{{$admin->username}}</td>
                                 <td>{{$admin->email}}</td>
                                 <td>
                                 	@if($admin->id ==2)
                                 	 {{"SuperAdmin"}}
                                 	@else
                                 	 {{"Admin"}} 
                                 	@endif 
                                 </td>
                                 <td>
                                 	<?php
                                       echo Carbon\Carbon::createFromTimestamp(strtotime($admin->created_at))->diffForHumans();
                                 	?>
                                 </td>
                                  <td>
                                  <div class="btn-group">("
                                       <a class="btn btn-primary" href="{{url('admin/admin/add')}}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="{{url('admin/admin/edit',$admin->id)}}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::route('admin.admin.getDelete',$admin->id)}}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              @endforeach                            
                           </tbody>
                        </table>  
     @endsection()