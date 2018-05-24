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

                  <div class="content table-responsive table-full-width">


                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Check</th>
                          <th>Sno</th>
                          <th>Photo</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Unverified Email</th>
                          <th>Phone</th>
                          <th>Unverified phone</th>
                          <th>User Type</th>
                          <th>Action</th>

                        </tr>
                      </thead>
              <div class="form-group">
                <button id="append" class="btn btn-sm btn-primary" onclick="div_show()">Send Mail
                </button>
              </div>
                      <tbody>
<div style="overflow:hidden;">                
  <div id="abc" style="width:100%;height:100%;opacity:0.95;top:0;left:0;display:none;position:fixed;background-color:#313131;overflow:auto">
    <div id="popupContact" style="position:absolute;left:50%;top:17%;margin-left:-202px;font-family:'Raleway',sans-serif">
      <form method="POST" action="{{ $url }}/sendBulk" id="form">
        {{ csrf_field() }}

      <input type="hidden" value="" name="ids" id="collect_id">
        <img id="close" src="{{ $url }}/images/close-256.png" onclick ="div_hide()" width="30">
        <textarea id="msg" name="message" placeholder="Message"></textarea>
         <a href="javascript:%20check_empty()" id="submit">Send</a>
					  <?php
					  $i=1;
					  foreach ($users as $user) { $sta=$user->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==3) { $viewst="Licensed Partner"; } else if($sta==0) { $viewst="Customer"; }?>
           <tr class="chek">
            <td><input type="checkbox"  name="mail[]" value="{{ $user->id }}" class="chek1"></td>
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
                  <td>
                    <a href="{{ url('verfied/email/'.$user->id) }}" class="btn btn-success btndisable">Unverififed Email</a>
                  </td>
                  <td><?php echo $user->phone;?></td>
                  <td>
                    <a href="{{ url('verfied/phone/'.$user->id) }}" class="btn btn-success btndisable">Unverififed Phone</a>
                  </td>
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
                        </tr>
                        <?php $i++; } ?>
                      </form>
                </div>
            </div>
        </div>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
<script type="text/javascript">
function check_empty() {
if (document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
$(document).ready(function(){
    $("#append").click(function(){

  });
    $(".chek").on('change','input[type=checkbox]',function () {
        if ($(this).is(':checked')) {
            var id = $(this).parent().find('.chek1').val();
            var ids = $("#collect_id").val();
            ids +=  id + ' ';
            $("#collect_id").val(ids)
        }
    });
});
</script> 

        </div>
        <!-- /page content -->
      </div>
      @include('admin.footer')
      </div>
    </div>
  </body>
</html>
