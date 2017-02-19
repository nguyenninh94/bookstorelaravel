@extends('admin.layouts.master')
@section('controller','Author')
@section('action','Edit')
@section('content')
                          <div class="panel-body">
                            <div class="form">
                                <form action="" method="POST">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                      <div class="form-group ">
                                          <label for="name" class="control-label col-lg-2">Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="name" type="text" value="{{old('name',isset($author) ? $author['name'] : null)}}">
                                              @if($errors->has('name'))
                                                <span class="help-block">
                                                   <strong style="color:red;">* {{ $errors->first('name') }}</strong>
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