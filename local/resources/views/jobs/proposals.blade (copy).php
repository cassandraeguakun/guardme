<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('style')
    <style type="text/css">
        .noborder ul,li { margin:0; padding:0; list-style:none;}
        .noborder .label { color:#000; font-size:16px;}
        .update{
            margin-top:10px
        }
    </style>
</head>
<body>

<!-- fixed navigation bar -->
@include('header')

        <!-- slider -->
<div class="clearfix"></div>

<div class="video">
    <div class="clearfix"></div>
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>My Submitted Proposals</h1></div>
    </div>
    <div class="container" >
        <div style="margin-top: 20px;"></div>
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

        <div class="row">
            <div class="col-md-12">
                <div>

                    <!-- Tab panes -->
                    <div class="height30"></div>
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Application Description</th>
                            <th>Is Hired</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proposals as $proposal)
                            <tr>
                                <td>{{ $proposal->title }}</td>
                                <td>{{ $proposal->application_description }}</td>
                                <td>{{ ($proposal->is_hired) ? 'yes' : 'no' }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="height30"></div>
        <div class="row">

        </div>

    </div>
</div>

<div class="clearfix"></div>
@include('footer')
<script>
    $(document).ready(function(){

    });
</script>


</body>
</html>