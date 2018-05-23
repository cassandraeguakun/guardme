 <?php $url = URL::to("/"); ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar bar1"></span>
          <span class="icon-bar bar2"></span>
          <span class="icon-bar bar3"></span>
        </button>
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse">
              <!-- <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div> -->

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">


					<?php
			 $url = URL::to("/");
			  $logphoto=Auth::user()->photo;
			 if($logphoto!=""){?>
                <img src="<?php echo  $url;?>/local/images/userphoto/<?php echo $logphoto;?>" alt="...">
			 <?php } else { ?>
			   <img src="{{asset('local/resources/assets/img/user.png')}}">
			 <?php } ?>{{ Auth::user()->name }}
                    <span class="ti-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $url;?>/admin/edituser/{{Auth::user()->id}}"> Edit Profile</a></li>
                    <li>
                      <a href="<?php echo $url;?>/admin/settings">

                        <span>Settings</span>
                      </a>
                    </li>

                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                  </ul>
                </li>




              </ul>
      </div>
  </div>
</nav>
<style>
.navbar .navbar-nav > li > a{
  padding: 7px 15px;
}
.user-profile img {
    width: 29px;
    height: 29px;
    border-radius: 50%;
    margin-right: 10px;
}
.navbar{
  min-height: auto;
}
</style>
