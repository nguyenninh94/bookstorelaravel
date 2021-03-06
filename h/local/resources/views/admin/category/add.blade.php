@extends('admin.layouts.master')
@section('controller','Category')
@section('action','Add')
@section('content')
                          <div class="panel-body">
                            <div class="form">
                                <form action="{{URL::route('admin.cate.getAdd')}}" method="POST">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                      <div class="form-group">
                                         <label for="cate_parent" class="control-label col-lg-2">Category Book <span>*</span></label>
                                         <div class="col-lg-10">
                                            <select class="form-control" name="cate_parent">
                                                 <option value="0">Please Choose Category</option>
                                                    <?php cate_parent($parent); ?>
                                            </select> 
                                          </div>
                                      </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="name" class="control-label col-lg-2">Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="name" type="text" placeholder="Please Enter Name Author" value="{{old('name')}}">
                                              @if($errors->has('name'))
                                                <span class="help-block">
                                                   <strong style="color:red;">* {{ $errors->first('name') }}</strong>
                                                </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Add</button>
                                              <button class="btn btn-default" type="reset">Reset</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
   @endsection()           