@extends('admin/layout/default')
@section('title', 'Add User')
@section('content')
  <?php $url = URL::to("/"); ?>
        <div class="content">
            <div class="container-fluid">
                
                <div class="row">

                    <div class="col-md-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                  
  @if(Session::has('success'))

      <div class="alert alert-success">

        {{ Session::get('success') }}

      </div>

  @endif


  
  
  @if(Session::has('error'))

      <div class="alert alert-danger">

        {{ Session::get('error') }}

      </div>

  @endif
        <div class="card">
          
                     <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.adduser') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <div class="header">
                        <h4 class="title">Add User</h4>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control border-input col-md-7 col-xs-12"  name="name" value="{{ old('name') }}" required="required" type="text">
                         @if ($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
             </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="{{ old('email') }}" required="required" class="form-control border-input col-md-7 col-xs-12">
              @if ($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password"  class="form-control border-input col-md-7 col-xs-12" required="required">
              
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="phone" name="phone" required="required" data-validate-length-range="8,20" class="form-control border-input col-md-7 col-xs-12">
                        </div>
                      </div>
            
            
            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control border-input col-md-7 col-xs-12">
              
              @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
            
            
            
            
            
            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usertype">User Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="usertype" required="required" class="form-control border-input col-md-7 col-xs-12">
            <option value=""></option>
                 <option value="0">Customer</option>
                 <option value="2">Seller</option>
            </select>
                          
                        </div>
                      </div>
            
            
            
            
                      <?php $url = URL::to("/"); ?>
                      <div class="ln_solid"></div>
                      <div class="text-center">
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <a href="<?php echo $url;?>/admin/users" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    
                    
                </div>
            </div>
       
@endsection
