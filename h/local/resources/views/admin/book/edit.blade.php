@extends('admin.layouts.master')
@section('controller','Book')
@section('action','edit')
@section('content')
   <div class="panel-body">
       <div class="form">
          <form action="" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <div class="form-group ">
                    <label for="cate" class="control-label col-lg-2">Category Book <span>*</span></label>
                      <div class="col-lg-10">
                          <select class="form-control" name="cate">

                             <option value="">Please Choose Category
                                 <?php cate_parent($cate,0,"--",$book->cate_id); ?>
                          </select> 
                          @if($errors->has('cate'))
                            <span class="help-block">
                               <strong style="color:red;">* {{ $errors->first('cate') }}</strong>
                            </span>
                          @endif
                      </div>
                   </div>

                   <div class="form-group ">
                    <label for="author" class="control-label col-lg-2">Author <span>*</span></label>
                      <div class="col-lg-10">
                          <select class="form-control" name="author">
                             <option value="">Please Choose Author</option>
                             @foreach($authors as $author)
                                 <option value="{{$author->id}}" selected="selected">{{$author->name}}</option>
                             @endforeach
                          </select> 
                          @if($errors->has('author'))
                            <span class="help-block">
                               <strong style="color:red;">* {{ $errors->first('author') }}</strong>
                            </span>
                          @endif
                      </div>
                   </div>

                  <div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Name <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="name" type="text" placeholder="Please Enter Name Book" value="{{$book->name}}">
                        @if($errors->has('name'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('name') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="qty" class="control-label col-lg-2">Quantity <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="qty" type="text" placeholder="Please Enter quantity" value="{{$book->qty}}">
                        @if($errors->has('qty'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('qty') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="price" class="control-label col-lg-2">Price <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="price" type="text" placeholder="Please Enter Price" value="{{number_format($book->price,0,",",".")}}">
                        @if($errors->has('price'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('price') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="discount" class="control-label col-lg-2">Discount <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="discount" type="text" placeholder="Please Enter Discount" value="{{$book->discount}}">
                        @if($errors->has('discount'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('discount') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group" style="height:200px">
                     <label for="image" class="control-label col-lg-2">Image Current <span class="required">*</span></label>
                        <div class="col-lg-10">
                              <img src="{{asset('upload/'.$book->image)}}" with="120px" height="200px"/>
                              <input type="hidden" name="img_current" value="{{$book->image}}"/>
                        </div>      
                  </div>

                  <div class="form-group ">
                    <label for="image" class="control-label col-lg-2">Image <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="image" type="file" placeholder="Please Enter Image" value="{{old('image')}}">
                        @if($errors->has('image'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('image') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="publisher" class="control-label col-lg-2">Publisher <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="publisher" type="text" placeholder="Please Enter Name Publisher" value="{{$book->publisher}}">
                        @if($errors->has('publisher'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('publisher') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Day Publish <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <input class="form-control" name="day" type="date" placeholder="Please Enter Day Publish" value="{{$book->day_publish}}">
                        @if($errors->has('day'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('day') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="content" class="control-label col-lg-2">Content <span class="required">*</span></label>
                    <div class="col-lg-10">
                       <textarea class="form-control" name="content">{{$book->content}}</textarea>
                       <script type="text/javascript">ckeditor("content")</script>
                        @if($errors->has('content'))
                       <span class="help-block">
                       <strong style="color:red;">* {{ $errors->first('content') }}</strong>
                       </span>
                        @endif
                    </div>
                  </div>
                    
                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                           <button class="btn btn-primary" type="submit">Edit</button>
                           <button class="btn btn-default" type="reset">Reset</button>
                       </div>
                  </div>
           </form>
       </div>
   </div>
@endsection()