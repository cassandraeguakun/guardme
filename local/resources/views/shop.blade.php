@extends('layouts.dashboard')
  


@section('bread-crumb')
    <div class="breadcrumb-section">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Profile Details</li>
        </ol>                       
        <h2 class="title">
            @if($editprofile[0]->admin == 2)
                {{'Freelancer'}}
            @elseif($editprofile[0]->admin == 0)
                {{'Employer'}}
            @endif
         Profile</h2>
    </div>
@endsection

@section('content')
    <div class="profile job-profile">
        <div class="user-pro-section">
            <div class="profile-details section">
                <h2>Profile Details</h2>
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

                <div class="alert alert-warning" role="alert">
                        Please complete your profile below. You will only be eligible to apply for work after your profile is complete and your documents are approved.
                </div>

                <form method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Username</label>
                        <input id="name" type="text" class="trackprogress form-control validate[required] text-input" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label for="firstname">First Name</label>
                        <input id="firstname" type="text" class="trackprogress form-control validate[required] text-input" name="firstname" value="<?php echo $editprofile[0]->firstname;?>" autofocus>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label for="lastname">Last Name</label>
                        <input id="lastname" type="text" class="trackprogress form-control validate[required] text-input" name="lastname" value="<?php echo $editprofile[0]->lastname;?>" autofocus>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="text" class="trackprogress form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $editprofile[0]->email;?>">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }}">
                            <label for="address" >Address</label>
                           
                                <div id="postcode_lookup"></div>
                                <br/>
                                <div class="form-group"><label>&nbsp;</label><p>Please fetch your address detail using your postcode</p></div>
                                @if ($errors->has('address_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_id') }}</strong>
                                    </span>
                                @endif
                                <!-- Add to your existing form -->
                                @if(count($address) >0)
                                <input id="line1" name="line1" class="trackprogress form-control text-input validate[required]" type="text" placeholder="Address line1" value="{{$address[0]->line1}}">
                                <input id="line2" name="line2" class="trackprogress form-control text-input" type="text" placeholder="Address line2" value="{{$address[0]->line2}}">
                                <input id="line3" name="line3" class="trackprogress form-control text-input" type="text" placeholder="Address line3" value="{{$address[0]->line3}}">  
                                <input id="town" name="town" class="trackprogress form-control text-input validate[required]" type="text" placeholder="Town" value="{{$address[0]->citytown}}">             
                                <input id="country" name="country" class="trackprogress form-control text-input  validate[required]" type="text" placeholder="Country" value="{{$address[0]->country}}">
                                <input id="postcode" name="postcode" class="trackprogress form-control text-input  validate[required]" type="text" placeholder="Postalcode" value="{{$address[0]->postcode}}">
                                @endif
                        </div> 
                </form>
            </div>
        </div>
    </div>
@endsection