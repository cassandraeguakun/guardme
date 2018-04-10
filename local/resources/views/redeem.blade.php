<!DOCTYPE html>
<html lang="en">
<head>
    @include('style')
</head>
<body>
<!-- fixed navigation bar -->
@include('header')


<div class="clearfix"></div>


<div class="video">
    <div class="clearfix"></div>
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>Referrals - Redeem</h1></div>
    </div>


    <div class="col-md-3 ">
        <div class="profile-sidebar">

            <div class="profile-userpic">
                <?php
                $url = URL::to("/");
                $userphoto = "/userphoto/";
                $path = '/local/images' . $userphoto . $editprofile[0]->photo;
                if($editprofile[0]->photo != ""){?>
                <img src="<?php echo $url . $path;?>" class="img-responsive"
                     alt="">
                <?php } else { ?>
                <img src="<?php echo $url . '/local/images/nophoto.jpg';?>"
                     class="img-responsive" alt="">
                <?php } ?>
            </div>

            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?php echo $editprofile[0]->name;?>
                </div>
                <?php $sta = $editprofile[0]->admin; if ($sta == 1) {
                    $viewst = "Admin";
                } else if ($sta == 2) {
                    $viewst = "Seller";
                } else if ($sta == 0) {
                    $viewst = "Customer";
                } ?>
                <div class="profile-usertitle-job">
                    <div style="margin-bottom:5px">
                        @if(Auth::user()->verified)
                            <span class="text-success">
									<i class="fa fa-check-circle"></i> Email verified
								</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="profile-userbuttons">
                <a href="<?php echo $url;?>/my_bookings"
                   class="btn btn-success btn-sm">My Bookings</a>
                <?php /* ?><a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Sign Out</a><?php */?>

            </div>

            <div class="profile-usermenu">
                <ul class="nav">
                    <!--<li class="active">
                        <a href="#">
                        <i class="glyphicon glyphicon-home"></i>
                        Overview </a>
                    </li>-->
                    <li>
                        <a href="<?php echo $url;?>/dashboard">
                            <i class="fa fa-user" aria-hidden="true"></i>

                            Account Settings </a>
                    </li>
                    <?php
                    $sellmail = Auth::user()->email;
                    $shcount = DB::table('shop')
                    ->where('seller_email', '=', $sellmail)
                    ->count();
                    ?>

                    <li>
                        <a href="<?php if(empty($shcount)){?><?php echo $url;?>/addcompany<?php } else { ?><?php echo $url;?>/account<?php } ?>"><i
                                    class="fa fa-gear" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <?php if($sta != 1){?>
                    <li>
                        <?php if(config('global.demosite') == "yes"){?>
                        <a href="#" class="btndisable"> <i class="fa fa-trash-o"
                                                           aria-hidden="true"></i>
                            Delete Account <span class="disabletxt"
                                                 style="font-size:13px;">( <?php echo config('global.demotxt');?>
                                )</span>
                        </a>
                        <?php } else { ?>

                        <a href="<?php echo $url;?>/delete-account"
                           onclick="return confirm('Are you sure you want to delete your account?');">

                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            Delete Account
                        </a>
                        <?php } ?>
                    </li>
                <?php } ?>
                <!--
						<li>
							<a href="{{ url('account') }}">
							<i class="fa fa-user" aria-hidden="true"></i>

							My Account </a>
						</li>
                                                -->
                    <li>
                        <a href="<?php echo $url;?>/referral">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>

                            Loyalty </a>
                    </li>
                    <li>
                        <a href="<?php echo $url;?>/logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>

                            Log Out </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>


    <div class="col-md-9 moves20">
        <div class="profile">
            <div class="clearfix"></div>
            <div class="container">
                <div class="container">
                    <b>Total Earned: </b><span>{{ $user->getBalance() }}</span>
                    <a href="/redeem" class="btn btn-primary">Redeem</a>
                </div>
                <div class="clearfix"></div>
                <div class="container">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-md-3">
                                <div class="shop-list-page">
                                    <div class="shop_pic">
                                        <img src="{{ URL::to('/') }}/local/images/{{ $item->image }}"
                                             class="img-responsive imgservice">
                                    </div>
                                    <div class="col-lg-12 shop_content">
                                        <h4 class="sv_shop_style"><a
                                                    href="{{ URL::to('/redeem/' . $item->id) }}">{{ $item->title }}</a>
                                        </h4>
                                        {{--<img src="http://guardme3.loc/local/images/nostar.png" alt="rated 0 stars" class="star_rates">--}}
                                        <h3>{{ $item->price }} points</h3>

                                        <div align="center"><a href="{{ URL::to('/redeem/' . $item->id) }}"
                                                               class="btn btn-success radiusoff">Redeem</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="height30"></div>
    <div class="row">


    </div>

</div>


<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>




