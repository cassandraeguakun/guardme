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
        <div class="col-md-12" align="center"><h1>Referrals</h1></div>
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
            <div class="container">
                <div class="clearfix"></div>
                <div class="container">
                    <b>Total Earned: </b><span>{{ $user->getBalance() }}</span>
                    <a href="/redeem" class="btn btn-primary">Redeem</a>
                </div>
                <div class="container">
                    <b>URL: </b><span><input type="text" class="form-control" style="float:right; width: 70%"
                                             value="{{ URL::to('/') . '/?uid=' . $user->name }}"></span>
                </div>
                <div class="clearfix"></div>
                <div class="container">
                    <h2>Users</h2>
                    <table id="datatable-responsive"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>E-mail</th>
                            <th>Earned</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $c = 1; ?>
                        @foreach ($referrals as $referral)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{$referral->email}}</td>
                                <td>10</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <h2>Items bought</h2>
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Item name</td>
                            <td>price</td>
                        </tr>
                        <?php $c = 1; ?>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                        @endforeach
                    </table>
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




