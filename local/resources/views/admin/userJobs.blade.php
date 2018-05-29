<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.title')

    @include('admin.style')
    <style>
        .dataTables_filter {
            display: none;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- <div class="main_container"> -->
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            @include('admin.sitename');

            <!-- <div class="clearfix"></div> -->

            <!-- menu profile quick info -->
        @include('admin.welcomeuser')
        <!-- /menu profile quick info -->

            <!-- <br /> -->
            <!-- sidebar menu -->
        @include('admin.menu')

        <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
        </div>
    </div>
    <div class="main-panel">
        <!-- top navigation -->
    @include('admin.top')

	<?php $url = URL::to( "/" ); ?>

    <!-- /top navigation -->

        <!-- page content -->
        <div class="content">
            <!-- top tiles -->

            <style>
                div.dataTables_wrapper div.dataTables_filter input {
                    border: 1px solid #000;
                }
            </style>


            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="padding:15px;">
                        <div class="header">
                            <h4 class="title">Users</h4>
                            <!-- <p class="category">Here is a subtitle for this table</p> -->
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table id="datatable-asdsd" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Title</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$i = 1;
								foreach ($jobs as $job) { ?>

                                <tr>
                                    <td><?php echo $i;?></td>
                                    
                                    <td><?php echo $job->title; ?></td>
                                    <td><?php echo $job->title; ?></td>
                                    <td><?php echo $job->title; ?></td>
                                    <td><?php echo $job->title; ?></td>
                                    <td><?php echo $job->title; ?></td>
                                    <td>
										Edit | Pause | Delete
                                    </td>
                                </tr>
								<?php $i ++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /page content -->
        </div>
        @include('admin.footer')
    </div>
</div>
<script src="/js/date-time-picker/bootstrap-datetimepicker.min.js"></script>
<script src="/js/date-time-picker/bootstrap-datetimepicker.uk.js"></script>
<script src="{{asset('/js/moment.js')}}"></script>

<script>
    //    User Filtering
    $(document).ready(function () {
        var table = $('#datatable-asdsd').DataTable();

        $('#gender').on('change', function () {
            table
                .columns(1)
                .search(this.value)
                .draw();
        });
        $('#location_filter').on('keyup', function () {
            table
                .columns(2)
                .search(this.value)
                .draw();
        });
        $('#date_reset').click(function () {
            $('#date_filter_max').val('')
            $('#date_filter_min').val('')
            table.draw();
        })

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = moment($('#date_filter_max').val()).format('YYYYMMDD');
                var max = moment($('#date_filter_min').val()).format('YYYYMMDD');
                var age = parseFloat(data[3]) || 0; // use data for the age column

                if (( isNaN(min) && isNaN(max) ) ||
                    ( isNaN(min) && age <= max ) ||
                    ( min <= age && isNaN(max) ) ||
                    ( min <= age && age <= max )) {
                    return true;
                }
                return false;
            }
        );

        $('#date_filter_max,#date_filter_min').on('change', function () {
            table.draw();
        });
        //   End User  Filtering
    });


</script>
</body>
</html>
