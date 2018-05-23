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
      <h4 class="title">Edit Page</h4>
      <!-- <p class="category">Here is a subtitle for this table</p> -->
  </div>
                 <?php $url = URL::to("/"); ?>
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-page') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}
                     <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-1">
                        <!-- <span class="section">Edit Page</span> -->

                        <div class="form-group">
                          <label for="name">Heading <span class="required">*</span>
                          </label>

                            <input id="page_title" class="form-control border-input"  name="page_title" value="<?php echo $pages[0]->page_title; ?>" required="required" type="text">


                        </div>


                       <div class="form-group">
                          <label for="desc">Description <span class="required">*</span>
                          </label>


                          <textarea id="page_desc" class="form-control border-input" required="required" name="page_desc" style="min-height:200px;"><?php echo $pages[0]->page_desc; ?></textarea>

                        </div>


  					  <input type="hidden" name="page_id" value="<?php echo $pages[0]->page_id; ?>">







                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <a href="<?php echo $url;?>/admin/pages" class="btn btn-primary btn-fill">Cancel</a>
                            <button id="send" type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>
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
