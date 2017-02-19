@extends('admin.layouts.master')
@section('controller','Author')
@section('action','Index')
@section('content')

                    <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>STT</th>
                                 <th><i class="icon_profile"></i>Name</th>
                                 <th><i class="icon_calendar"></i>Create</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php $stt=0;?>
                              @foreach($authors as $author)
                              <?php $stt++;?>
                              <tr>
                                 <td>{{$stt}}</td>
                                 <td>{{$author->name}}</td>
                                 <td>
                                 	<?php
                                       echo Carbon\Carbon::createFromTimestamp(strtotime($author->created_at))->diffForHumans();
                                 	?>
                                 </td>
                                  <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{ url('admin/author/add') }}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="{{ URL::route('admin.author.getEdit',$author->id) }}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ url('admin/author/delete',$author->id) }}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              @endforeach                            
                           </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                          {{ $authors->links() }}
                        </div>  
     @endsection()