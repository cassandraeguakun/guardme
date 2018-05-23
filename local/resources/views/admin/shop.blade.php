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
                  <!-- <div class="x_title">
                    <h2>Shop</h2>
                    <ul class="nav navbar-right panel_toolbox">

                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>

                  </div> -->
                  <div class="header">
                      <h4 class="title">Companies</h4>
                      <!-- <p class="category">Here is a subtitle for this table</p> -->
                  </div>

                  <div class="content table-responsive table-full-width">


                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  <th>Shop Name</th>

						  <th>Featured</th>
						  <th>Status</th>
						  <th>Total Balance</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $i=1;
					  foreach ($shop as $viewshop) { ?>


                        <tr>
						 <td><?php echo $i;?></td>

                          <td><?php echo $viewshop->shop_name;?></td>

						 

						   <td><?php echo $viewshop->featured;?></td>

						   <td><?php echo $viewshop->status;?></td>

						   <td> - </td>

						  <td>

			<?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  <a href="<?php echo $url;?>/admin/edit-shop/{{ $viewshop->id }}" class="btn btn-success">Edit</a>
						  <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				   <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/shop/{{ $viewshop->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
				  <?php } ?>
						  </td>
                        </tr>
                        <?php $i++;} ?>

                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>






        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>



  </body>
</html>
