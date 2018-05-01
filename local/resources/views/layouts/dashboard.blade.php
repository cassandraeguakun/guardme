<!DOCTYPE html>
<html lang="en">
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">

   @include('style')  

    <script>
           window.verificationConfig =  {
              url  : "{{ url('/') }}"
          }
      </script>

</head>
<body>

    <?php

    $url = URL::to("/"); ?>

    @include('header')


     <section class="clearfix job-bg  ad-profile-page">
        <div class="container">

            @yield('bread-crumb')


            <?php $url = URL::to("/");
                $userphoto="/userphoto/";
                        $path ='/local/images'.$userphoto.$editprofile[0]->photo;
                        ?>
            <div class="job-profile section">   
                <div class="user-profile">
                    <div class="user-images">
                        @if($editprofile[0]->photo!="")
                            <img src="<?php echo $url.$path;?>" alt="User Images" class="img-responsive profile-img">
                        @else
                            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="User Images" class="img-responsive">
                        @endif
                    </div>
                    <div class="user">
                        <h2>Hello, <a href="#">@if($editprofile[0]->firstname!='')
                                        {{$editprofile[0]->firstname.' '.$editprofile[0]->lastname}}
                                    @else
                                        {{$editprofile[0]->name}}
                                    @endif</a></h2>
                        <!-- <h5>You last logged in at: 10-01-2017 6:40 AM [ USA time (GMT + 6:00hrs)]</h5> -->
                    </div>
                    <div class="favorites-user">
                        <div class="my-ads">
                            <a href="applied-job.html">0<small>Total Jobs</small></a>
                        </div>
                        <div class="favorites">
                            <a href="bookmark.html">0<small>Balance</small></a>
                        </div>
                    </div>  
                </div>

                <ul class="user-menu">
                    <li  class="@if(Route::current()->uri()=='account') {{'active'}} @endif"><a href="{{URL::to('account')}}">Profile </a></li>
                    <li><a href="resume.html">Verification</a></li>
                    <li><a href="edit-resume.html">My Jobs</a></li>
                    <li><a href="{{URL::to('referral')}}">Loyalty</a></li>
                    <li><a href="{{URL::to('delete-account')}}" onclick="return confirm('Are you sure you want to delete your account?');">Close account</a></li>
                </ul>
            </div>


            @yield('content')

        </div>
    </section>
   @include('footer')
        <script src="{{ asset('js/vue_axios.js') }}"></script>
    <script src="{{ asset('js/phone.min.js') }}"></script>
</body>
</html>