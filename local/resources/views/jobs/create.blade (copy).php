@extends('jobs.template')

@section('bread-crumb')
    <div class="breadcrumb-section">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/')}}">Home</a></li>
            <li>Create Job</li>
        </ol><!-- breadcrumb -->                        
        <h2 class="title">Create Job</h2>
    </div>
@endsection


@section('content')

<div class="row">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @include('shared.message')

<div class="wizard">
    <a><span class="badge">1</span> Create Job</a>
    <a><span class="badge">2</span> Create Schedule</a>
    <a class="current"><span class="badge badge-inverse">3</span> Broadcast Job</a>
    <a><span class="badge">4</span> Payment</a>
</div>
</div>

@endsection






        <!-- slider -->
<div class="clearfix"></div>

<div class="video">
    <div class="clearfix"></div>
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>Create Job</h1></div>
    </div>
    <div class="container" >
        <div style="margin-top: 20px;"></div>
        
        <div class="row">
            <div class="col-md-12">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="javascript:void(0)">Create job</a></li>
                        <li role="presentation"><a href="javascript:void(0)">Create Schedule</a></li>
                        <li role="presentation"><a href="javascript:void(0)">Broadcast Job</a></li>
                        <li role="presentation"><a href="javascript:void(0)">Payment</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="height30"></div>
                        <div role="tabpanel" class="tab-pane active" id="create_job">
                            <label for="">Company name: Test </label>
                            <form id="create_job_form" method="POST" action="{{ route('api.create.job') }}">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" name="title" class="form-control title" id="job_title" placeholder="Job Title">
                                    <span class="error-span text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="security_category">Security Category</label>
                                    <select type="text" name="security_category" class="form-control" id="security_category">
                                        <option value="0">Please Select Security Category</option>
                                        @foreach($all_security_categories as $sec_cat)
                                            <option value="{{ $sec_cat->id }}">{{ $sec_cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="security_category">Industry</label>
                                    <select type="text" name="business_category" class="form-control" id="business_category">
                                        <option value="0">Please Select Business Category</option>
                                        @foreach($all_business_categories as $bus_cat)
                                            <option value="{{ $bus_cat->id }}">{{ $bus_cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <div id="postcode_lookup"></div>
                                    </div>

                                    <div class="form-group">
                                        <input id="line1" name="line1" class="form-control text-input validate[required]" type="text" placeholder="Address line1" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="line2" name="line2" class="form-control text-input" type="text" placeholder="Address line2" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="line3" name="line3" class="form-control text-input" type="text" placeholder="Address line3" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="town" name="town" class="form-control text-input validate[required]" type="text" placeholder="Town" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="country" name="country" class="form-control text-input  validate[required]" type="text" placeholder="Country" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="postcode" name="postcode" class="form-control text-input  validate[required]" type="text" placeholder="Postalcode" value="">
                                        <input id="addresslat" name="addresslat" class="form-control text-input" type="hidden" value="">
                                        <input id="addresslong" name="addresslong" class="form-control text-input" type="hidden" value="">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" rows="10" class="form-control description" id="description" placeholder="Description"></textarea>
                                    <span class="error-span text-danger"></span>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Next</button>
                            </form>
                        </div>
                    </div>

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
        $("#create_job_form").on("submit", function(e){
            formErrors = new Errors();
            e.preventDefault();
            $.ajax({
                url: $("#create_job_form").attr("action"),
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    var nextUrl = "{{ route('job.schedule', ":id") }}";
                    nextUrl = nextUrl.replace(":id", data.id);
                    window.location.href = nextUrl;
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    formErrors.record(errors);
                    formErrors.load();
                }
            });
        });
    });
</script>


</body>
</html>