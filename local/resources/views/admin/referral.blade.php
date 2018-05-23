<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.title')

    @include('admin.style')

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

                <!-- <br/> -->

                <!-- sidebar menu -->
            @include('admin.menu')




            <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
  <div class="main-panel">
    @include('admin.top')

    <style>
    div.dataTables_wrapper div.dataTables_filter input{
      border: 1px solid #000;
    }
    </style>
    
    <?php $url = URL::to("/"); ?>


    <!-- /top navigation -->

        <!-- page content -->
        <div class="content">
            <!-- top tiles -->


            <div class="container-fluid">
                <div class="card" style="padding: 15px;">
                    <!-- <div class="x_title">
                        <h2>Referral Items</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div> -->

                    <div class="header">
                        <h4 class="title">Referral Items</h4>
                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                    </div>

                        <form class="form-horizontal form-label-left" role="form" method="POST"
                              action="{{ route('admin.itemcreate') }}" novalidate>
                              <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-1">
                            <div class="form-group">
                                <label for="title">Title
                                </label>

                                    <input type="text" id="title" name="title" required="required"
                                           class="form-control border-input">

                                         </div>
                            <div class="form-group">
                                <label for="image">Image
                                </label>

                                    <input type="text" id="image" name="image" required="required"
                                           class="form-control border-input">

                            </div>

                            <div class="form-group">
                                <label  for="price">Price
                                </label>

                                    <input type="number" id="price" name="price" required="required"
                                           class="form-control border-input">

                            </div>
                            {{ csrf_field() }}

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="send" type="submit" class="btn btn-info btn-fill btn-wd">Add Item</button>
                                </div>
                            </div>
                          </div>
                        </form>

                        <div class="content table-responsive table-full-width">


                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->image }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                </div>


            </div>
          </div>
            <!-- /page content -->

            @include('admin.footer')
        </div>
    </div>


</body>
</html>
