<div class="profile clearfix">
              <div class="profile_pic">
			 <?php
			 $url = URL::to("/");
			  $logphoto=Auth::user()->photo;
			 if($logphoto!=""){?>
                <img src="<?php echo  $url;?>/local/images/userphoto/<?php echo $logphoto;?>" alt="..." class="img-circle profile_img">
			 <?php } else { ?>
			   <img src="{{asset('local/resources/assets/img/user.png')}}" alt="..." class="img-circle profile_img">
			 <?php } ?>

			  </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
<style>
.profile_pic {
    width: 35%;
    float: left;
}
.profile_info {
    padding: 25px 10px 10px;
    width: 65%;
    float: left;
}

.img-circle.profile_img {
    width: 70%;
    background: #fff;
    margin-left: 15%;
    z-index: 1000;
    position: inherit;
    margin-top: 20px;
    border: 1px solid rgba(52,73,94,.44);
    padding: 4px;
}
.profile_info h2 {
    font-size: 14px;
    color: #ECF0F1;
    margin: 0;
    font-weight: 300;
}
</style>
