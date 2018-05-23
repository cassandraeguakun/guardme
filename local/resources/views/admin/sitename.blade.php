<?php $url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>

<div class="logo">
    <a href="<?php echo $url;?>" class="simple-text" target="_blank">
			<img src="<?php echo $url.'/local/images/new_logo.png';?>" alt="logo">
      <!-- <i class="fa fa-globe"></i> <?php //echo $setts[0]->site_name;?> -->
    </a>
</div>
<!-- <div class="navbar nav_title" style="border: 0;">
              <a href="<?php //echo $url;?>" class="site_title" target="_blank"><i class="fa fa-globe"></i> <span><?php //echo $setts[0]->site_name;?></span></a>
            </div> -->
