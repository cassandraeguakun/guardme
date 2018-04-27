<?php 
  use Illuminate\Support\Facades\Route;
  $currentPaths= Route::getFacadeRoot()->current()->uri();  
  $url = URL::to("/");
?>
<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->

      <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo $url;?>/admin" class="simple-text">
                    <?php if(!empty($setts[0]->site_logo)){?>
                    <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" title="Thumbsup">
                    <?php }else{
                      echo $setts[0]->site_name;
                    }?>
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo Request::is('partners')?'active':''; ?>"><a href="<?php echo $url;?>/partners"><i class="fa fa-laptop"></i> Dashboard </a></li>
                <li><a href="#"><i class="fa fa-credit-card"></i> Wallet </a></li>
                <li><a href="#"><i class="fa fa-users"></i> Manage Users </a></li>
                <li><a href="#"><i class="fa fa-cubes"></i> Manage Jobs </a></li>
                <li><a href="#"><i class="fa fa-check-square-o"></i> Verification </a></li>
                <li><a href="#"><i class="fa fa-area-chart"></i> Reports </a></li>
                <li><a href="#"><i class="fa fa-life-ring"></i> Support </a></li>
          
            </ul>
      </div>
    </div>