<!DOCTYPE html>
<html lang="en">
  <head>

   @include('admin.title')

    @include('admin.style')


  </head>

  <body>
    <div class="wrapper">
      <!-- <div class="main_container"> -->
      <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            @include('admin.sitename');

            <!-- <div class="clearfix"></div> -->

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <!-- <br /> -->

            <!-- sidebar menu -->
            @include('admin.menu')




            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

<div class="main-panel">
        <!-- top navigation -->
       @include('admin.top')




        <!-- /top navigation -->

        <!-- page content -->
        <div class="content">
          <!-- top tiles -->






		 <div class="container-fluid">
       <div class="card" style="padding:15px;">
                <div class="row">



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

  <div class="header">
      <h4 class="title">Add User</h4>
      <!-- <p class="category">Here is a subtitle for this table</p> -->
  </div>

                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.adduser') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}
                     <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-1">
                      <!-- <span class="section">Add User</span> -->

                      <div class="form-group">
                        <label for="name">Username <span class="required">*</span>
                        </label>

                          <input id="name" class="form-control border-input"  name="name" value="{{ old('name') }}" required="required" type="text">
                         @if ($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                      </div>
                      <div class="form-group">
                        <label for="email">Email <span class="required">*</span>
                        </label>

                          <input type="email" id="email" name="email" value="{{ old('email') }}" required="required" class="form-control border-input">
						  @if ($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                      </div>


                      <div class="form-group">
                        <label for="password" >Password <span class="required">*</span></label>

                          <input id="password" type="password" name="password"  class="form-control border-input" required="required">


                      </div>

                      <div class="form-group">
                        <label for="telephone">Phone <span class="required">*</span>
                        </label>

                          <input type="tel" id="phone" name="phone" required="required" data-validate-length-range="8,20" class="form-control border-input">

                      </div>


					  <div class="form-group">
                        <label for="photo">Photo <span class="required">*</span>
                        </label>

                          <input type="file" id="photo" name="photo" class="form-control border-input">

						  @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>






					  <div class="form-group">
                        <label for="usertype">User Type <span class="required">*</span>
                        </label>

						<select name="usertype" required="required" class="form-control border-input">
						<option value=""></option>
							   <option value="0">Customer</option>
							   <option value="2">Seller</option>
                 <option value="3">Licensed Partner</option>
						</select>


                      </div>




                      <?php $url = URL::to("/"); ?>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/users" class="btn btn-primary btn-fill">Cancel</a>
                          <button id="send" type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                        </div>
                      </div>
                    </div>
                    </form>

                </div>
              </div>
            </div>














        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>



  </body>
</html>
