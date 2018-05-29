@extends('layouts.dashboard-template')
  


@section('bread-crumb')
    <div class="breadcrumb-section">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Applications</li>
        </ol>                       
        <h2 class="title">
           My Applications</h2>
    </div>
@endsection

@section('content')

    <div class="section trending-ads latest-jobs-ads">
    <div class="col-sm-6">
        <h4>My Jobs</h4>
    </div>
    <div class="col-sm-6">
        <div class="featured-top">
                                
                                
                                    <div class="dropdown category-dropdown pull-right">
                                                               
                                        <a data-toggle="dropdown" href="#"><span class="change-text">Fillter</span><i class="fa fa-caret-square-o-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                            <li>
                                            <a href="{{ url('jobs/proposals').'?filter=1' }}">Open Jobs</a></li>
                                            <li><a href="{{ url('jobs/proposals').'?filter=2' }}">Completed Jobs</a></li>
                                        </ul>                               
                                    </div><!-- category-change -->      
                                                          
                            </div>
    </div>
        



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @include('shared.message')
    
    @foreach($proposals as $application)
        @if($application->completion_status == '0')
        <div class="job-ad-item">
            <div class="item-info">
                <div class="item-image-box">
                    <div class="item-image">
                        
                        <a href="{{ route('my.application.view',['id'=>$application->id,'job_id'=>$application->job_id]) }}" ><img align="center" class="img-responsive" src="{{ URL::to("/")}}/images/img-placeholder.png" alt="{{$application->job_title}}"/></a>
                       
                            

                        
                    </div><!-- item-image -->
                </div>
                    
                <div class="ad-info">
                    <span><a href="{{ route('my.application.view',['id'=>$application->id,'job_id'=>$application->job_id]) }}" class="title">

                                        {{$application->job_title}} @ {{$application->shop_name}}
                                    </a> </span>
                    <div class="ad-meta">
                       
                        <ul>
                            <li>Is hired: @if($application->is_hired)
                                            <i class="fa fa-check-circle-o ico-30 green"></i>
                                        @else
                                            <i class="fa fa-times-circle-o ico-30 red"></i> 
                                        @endif
                            </li>

                            <li>
                                Applied Date: {{date('M d, Y',strtotime($application->applied_date))}}
                            </li>
                            
                        </ul>
                    </div>

                </div><!-- ad-info -->

                <div class="pull-right top-30">
                    <a href="{{ route('my.application.view',['id'=>$application->id,'job_id'=>$application->job_id]) }}"><button class="btn btn-success">View</button></a>
                </div>
            </div><!-- item-info -->
        </div>
        @endif

    @endforeach
    </div>
@endsection

