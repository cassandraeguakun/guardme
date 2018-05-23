@extends('layouts.dashboard-template')
  


@section('bread-crumb')
    <div class="breadcrumb-section">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Close Account</li>
        </ol>                       
        <h2 class="title">Close Account</h2>
    </div>
@endsection

@section('content')
    <div class="close-account text-center">
                <div class="delete-account section">
                    <h2>Delete Your Account</h2>
                    <h4>Are you sure, you want to delete your account?</h4>
                    <a href="{{URL::to('delet-account')}}"  class="btn">Delete Account</a>
                    <!-- <a href="{{URL::to('delet-account')}}" onclick="return confirm('Are you sure you want to delete your account?');" class="btn">Delete Account</a>-->
                    <a href="{{URL::to('account')}}" class="btn cancle">Cancle</a>
                </div>          
            </div>
@endsection