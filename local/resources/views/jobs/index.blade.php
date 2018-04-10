 
<!DOCTYPE html>
<html lang="en">
<head>
   @include('style')
</head>
<body>
    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
	
	<div class="clearfix"></div>
	<div class="video">
	    <div class="clearfix"></div>
        <div class="headerbg">
            <div class="col-md-12" align="center"><h1>Jobs</h1></div>
        </div>

	    <div class="container">	 
	        <div class="height30"></div>
	 
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
	
	
	<div class="clearfix"></div>
	<div class="row" align="right" style="margin-bottom:2px;">
	 <?php if(config('global.demosite')=="yes"){?><span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span><button type="button" class="btn btn-primary radiusoff btndisable">Add Jobs</button> 
								<?php } else { ?>
	
	 <a href="/jobs/create" class="btn btn-primary radiusoff">Add Jobs</a>
	 
	 </div>
	 
	<div class="row">
	<div class="table-responsive">
	<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Category</th>
      <th>Industry</th>
      <th>Desctription</th>
	  <th>Location</th>
	  <th>Personnel</th>
	  <th>Hours</th>
	  <th>Hourly Pay</th>
	  <th>wallet Freq.</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $ii=1;
  foreach($jobs as $job){?>
    <tr>
      <th><?php echo $job_title;?></th>
      <td><?php echo $category;?></td>
      <td><?php echo $industry;?></td>
      <td><?php echo $description;?></td>
      <td><?php echo $location;?></td>
      <td><?php echo $no_of_personnel;?></td>
      <td><?php echo $no_of_hours;?></td>
      <td><?php echo $pay_per_hr->price.' '.$setting[0]->site_currency;?></td>
      <td><?php echo $wallet_debit_frequency;?></td>
	  <td>
	  <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="Edit" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="Edit" border="0"></a>
	  <?php } ?>
	  
	  
	  </td>
	  <td>
	   <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>/delete" onclick="return confirm('Are you sure you want to delete this?')">
	  <img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a></td>
	  <?php } ?>
    </tr>
  <?php $ii++; } ?>
    
	
	
	
  </tbody>
</table>
	</div>
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>