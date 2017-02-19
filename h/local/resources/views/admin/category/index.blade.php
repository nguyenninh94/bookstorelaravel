@extends('admin.layouts.master')
@section('controller','Category')
@section('action','Index')
@section('content')

                    <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>STT</th>
                                 <th><i class="icon_profile"></i>Name</th>
                                 <th><i class="icon_profile"></i>Category Parent</th>
                                 <th><i class="icon_calendar"></i>Create</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php $stt=0;?>
                              @foreach($cates as $cate)
                              <?php $stt++;?>
                              <tr>
                                 <td>{{$stt}}</td>
                                 <td>{{$cate->name}}</td>
                                 <td>
                                   @if($cate->parent_id == 0)
                                     {{"None"}}
                                   @else
                                    <?php
                                      $parent=DB::table('categories')->where('id','=',$cate->parent_id)->first();
                                      echo $parent->name;
                                    ?>
                                   @endif  
                                 </td>
                                 <td>
                                   <?php
                                      echo Carbon\Carbon::createFromTimestamp(strtotime($cate->created_at))->diffForHumans();
                                   ?>
                                 </td>
                                  <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{ url('admin/cate/add') }}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="{{URL::route('admin.cate.getEdit',$cate->id)}}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::route('admin.cate.getDelete',$cate->id)}}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                           {{$cates->links()}}
                        </div>  
     @endsection()