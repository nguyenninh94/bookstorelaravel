@extends('admin.layouts.master')
@section('controller','User')
@section('action','Index')
@section('content')

                    <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>STT</th>
                                 <th><i class="icon_profile"></i>Name</th>
                                 <th><i class="icon_profile"></i>Username</th>
                                 <th><i class="icon_email"></i>Email</th>
                                 <th><i class="icon_profile"></i> Active</th>
                                 <th><i class="icon_calendar"></i>Create</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php $stt=0;?>
                              @foreach($users as $user)
                              <?php $stt++;?>
                              <tr>
                                 <td>{{$stt}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->username}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>
                                   @if($user->verified==1)
                                   {{"Actived"}}
                                   @else
                                   {{"No Active"}}
                                   @endif
                                 </td>
                                 <td>
                                 	<?php
                                       echo Carbon\Carbon::createFromTimestamp(strtotime($user->created_at))->diffForHumans();
                                 	?>
                                 </td>
                                  <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{url('admin/user/delete',$user->id)}}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              @endforeach                            
                           </tbody>
                        </table>  
     @endsection()