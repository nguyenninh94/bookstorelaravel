@extends('admin.layouts.master')
@section('controller','Admin')
@section('action','Add')
@section('content')
                          <div class="panel-body">
                            <div class="form">
                                <form action="{{ URL::route('admin.admin.getAdd') }}" method="POST">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="username" type="text" placeholder="Please Enter Name Author" value="{{old('username')}}">
                                              @if($errors->has('username'))
                                                <span class="help-block">
                                                   <strong style="color:red;">* {{ $errors->first('username') }}</strong>
                                                </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="email" type="email" placeholder="Please Enter Name Author" value="{{old('email')}}">
                                              @if($errors->has('email'))
                                                <span class="help-block">
                                                   <strong style="color:red;">* {{ $errors->first('email') }}</strong>
                                                </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="password" type="password" placeholder="Please Enter Name Author">
                                              @if($errors->has('password'))
                                                <span class="help-block">
                                                   <strong style="color:red;">* {{ $errors->first('password') }}</strong>
                                                </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password_confirm" class="control-label col-lg-2">Password Confirm <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="password_confirmation" type="password" placeholder="Please Enter Name Author">
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