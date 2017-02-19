@extends('admin.layouts.master')
@section('controller','Book')
@section('action','Index')
@section('content')

                    <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>STT</th>
                                 <th><i class="icon_profile"></i>Name</th>
                                 <th>Image</th>
                                 <th>Price</th>
                                 <th>Quantity</th>
                                 <th>Discount</th>
                                 <th>Publisher</th>
                                 <th>Category</th>
                                 <th>Create</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php $stt=0;?>
                              @foreach($books as $book)
                              <?php $stt++;?>
                              <tr>
                                 <td>{{$stt}}</td>
                                 <td>{{$book->name}}</td>
                                 <td><img src="{{url('upload/'.$book->image)}}" with="80px" height="60px"/></td>
                                 <td>{{number_format($book->price,0,",",".")}} <span>VNĐ</span></td>
                                 <td>{{$book->qty}} <span>Cuốn</span></td>
                                 <td>{{$book->discount}} <span>%</span></td>
                                 <td>{{$book->publisher}}</td>
                                 <td>
                                   <?php
                                    $cbook=DB::table('categories')->where('id','=',$book->cate_id)->first();
                                    ?>    
                                    @if(!empty($cbook->name))
                                       {{$cbook->name}}
                                    @endif
                                 </td>
                                 <td>
                                   <?php
                                      echo Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->diffForHumans();
                                   ?>
                                 </td>
                                  <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{ url('admin/book/add') }}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="{{url('admin/book/edit',$book->id)}}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{url('admin/book/delete',$book->id)}}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                        {{$books->links()}}
                        </div>  
     @endsection()