@extends('admin/layout/default')
@section('title', 'Users')
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
       <?php $viewst = ""; ?>
          
                     <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                <div class="x_panel">
                  <div class="header">
                  <h4 class="title">Users</h4>
                </div>
                
          <div align="right">
           
                  <div class="x_content">
                   
                  <div class="table-responsive">
                    <div align="right">
          
                  <div class="x_content">
                   <?php if(config('global.demosite')=="yes"){?>
                    <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-info btn-fill btn-wd btndisable">Add User</a> 
                    <?php } else { ?>
                    <a href="<?php echo $url;?>/admin/adduser" class="btn btn-info btn-fill btn-wd">Add User</a>
                    <?php } ?>
                    
          
                    <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
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
            foreach ($users as $user) { $sta=$user->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; }?>
    
            
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
                </div>
              </div>
        
        
        
     
      
      
      
        </div>
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
       
        <script type="text/javascript">
          $(document).ready(function() {
              $('#datatable-responsive').DataTable();
          });
        </script>
@endsection
