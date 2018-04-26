<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	<section class="clearfix job-bg  ad-profile-page">
		<div class="container">
			<div class="breadcrumb-section">
				<ol class="breadcrumb">
					<li><a href="{{URL::to('/')}}">Home</a></li>
					<li><?php echo $about[0]->page_title;?></li>
				</ol>						
				<h2 class="title"><?php echo $about[0]->page_title;?></h2>
			</div>
			<div class="career-objective section">
				<div class="user-pro-section">
					<!-- profile-details -->
					<div class="profile-details section">
						<h2><?php echo $about[0]->page_title;?></h2>
					</div>
				</div>
				<?php echo str_replace("'","",$about[0]->page_desc);?>
			</div>
		</div>
	</section>


      @include('footer')
</body>
</html>