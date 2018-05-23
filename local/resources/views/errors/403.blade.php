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
        <div class="col-md-12" align="center"><h1>Unauthorized action.</h1></div>
    </div>
    <div class="container">

        <div class="height30"></div>
        <div class="row">
            <div class="col-md-12" align="center" style="font-size:20px; margin: 50px;">

                {{ $exception->getMessage() }}

            </div>


        </div>

    </div>
</div>
<div class="clearfix"></div>
@include('footer')
</body>
</html>