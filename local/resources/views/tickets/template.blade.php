 
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
   @stack('styles')
	
<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>



</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
 
	
	<section class=" job-bg page  ad-profile-page">
		<div class="container">
	
        	@yield('content')
		</div>
	</section>
	  @include('footer')
	  

	  @stack('scripts')
</body>
</html>