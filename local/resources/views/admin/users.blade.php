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

		<?php $url = URL::to("/"); ?>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="content">
          <!-- top tiles -->


<style>
div.dataTables_wrapper div.dataTables_filter input{
  border: 1px solid #000;
}
</style>



		 <div class="container-fluid">
                <div class="row">
                  <div class="card" style="padding:15px;">
                    <div class="header">
                        <h4 class="title">Users</h4>
                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                    </div>
                  <!-- <div class="x_title">
                    <h2>Users</h2> -->
                    <!-- <ul class="nav navbar-right panel_toolbox">

                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul> -->
                    <!-- <div class="clearfix"></div> -->

                  <!-- </div> -->
				  <!-- <div align="right"> -->
				  <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add User</a>
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/adduser" class="btn btn-primary">Add User</a>
				  <?php } ?>
<div class="content">
						  <h5>Filter:</h5>
						  <form class="form-inline" method="get">
							  <div class="form-group">
								  <label for="location_filter" class="control-label">Location:</label>
								  <input type="text" class="form-control" name="location" id="location_filter">
							  </div>
							  <div class="form-group">
								  <label for="gender" class="control-label">Gender:</label>
								  <select name="gender" id="gender" class="form-control">
									  <option value="">Pick an option...</option>
									  <option value="male">Male</option>
									  <option value="female">Female</option>
								  </select>
							  </div>
							  <div class="form-group">
								  <input type="text" class="form-control" id="date_filter" name="reg_date">
							  </div>
							  <div class="form-group">
								  <button class="btn btn-sm btn-primary" type="submit">Filter</button>
							  </div>
						  </form>
					  </div>
					  <div class="content table-responsive table-full-width">

						  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							  <thead>
							  <tr>
								  <th>Sno</th>
								  <th>Photo</th>
								  <th>Username</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th>User Type</th>
								  <th>Action</th>

							  </tr>
							  </thead>
							  <tbody>
                              <?php
                              $i=1;
                              foreach ($users as $user) { $sta=$user->admin; if($sta==1){ $viewst="Admin"; }
                              else if($sta==2) { $viewst="Freelancer"; } else if($sta==3) { $viewst="Licensed
                                      Partner"; } else if($sta==0) { $viewst="Employer"; }?>


							  <tr>
								  <td><?php echo $i;?></td>
                                  <?php
                                  $userphoto="/userphoto/";
                                  $path ='/local/images'.$userphoto.$user->photo;
                                  if($user->photo!=""){
                                  ?>
								  <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
                                  <?php } else { ?>
								  <td><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="70"></td>
                                  <?php } ?>
								  <td><?php echo $user->name;?></td>
								  <td><?php echo $user->email;?></td>
								  <td><?php echo $user->phone;?></td>
								  <td><?php echo $viewst;?></td>
								  <td>
                                      <?php if(config('global.demosite')=="yes"){?>
									  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                      <?php } else { ?>

									  <a href="<?php echo $url;?>/admin/edituser/{{ $user->id }}" class="btn btn-success">Edit</a>
                                      <?php } ?>
                                      <?php if(config('global.demosite')=="yes"){?>
									  <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                      <?php } else { ?>

									  @if($sta!=1)<a href="<?php echo $url;?>/admin/users/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a> @endif

                                      <?php } ?>
								  </td>
							  </tr>
                              <?php $i++; } ?>

							  </tbody>
						  </table>

					  </div>

              </div>




            </div>


        </div>
        <!-- /page content -->
      </div>
      @include('admin.footer')
      </div>
    </div>
	<script src="/js/date-time-picker/bootstrap-datetimepicker.min.js"></script>
	<script src="/js/date-time-picker/bootstrap-datetimepicker.uk.js"></script>
	<script src="/js/moment.js"></script>

	<script>
		$(function () {
			$('#date_filter').datetimepicker({
				format: 'YYYY-MM-DD'
			});
		})
	</script>
  </body>
</html>
