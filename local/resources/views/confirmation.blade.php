@extends('layouts.app')

@section('content')
@include('style')
@include('header')

<section class="clearfix job-bg delete-page">
  <div class="container">
      <div class="breadcrumb-section">
          <!-- breadcrumb -->
          <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Home</a></li>
              <li><a href="{{URL::to('account')}}">Account</a></li>
              <li>Confirmation</li>
          </ol><!-- breadcrumb -->                        
          <h2 class="title">{!! session('confirmation_title') !!}</h2>
      </div><!-- banner -->

      <div class="close-account text-center">
          <div class="delete-account section">
            {!! session('confirmation_message') !!}
          </div>
      </div>
  </div>
</section>

@include('footer')

@endsection