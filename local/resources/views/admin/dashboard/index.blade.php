@extends('admin/layout/default')
@section('title', 'Dashboard')
@section('content')
  <?php $url = URL::to("/"); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Total Employers</p>
                                            <?php echo $total_employers;?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Total Freelancers</p>
                                            <?php echo $total_freelancers;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Active Jobs</p>
                                            <?php echo $total_active_jobs;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-book"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Open Tickets</p>
                                            <?php echo $total_open_tickets;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-book"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Uncleared VAT</p>
                                            <?php echo $total_vat;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="numbers">
                                            <p>Uncleared Fees</p>
                                            <?php echo $total_fees;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Last seven days...</h4>
                                
                            </div>
                            <div class="content">
                                <script type="text/javascript">
  window.onload = function () {
      var dps = [
    <?php echo $javas;?>
    ];
    
    var chart = new CanvasJS.Chart("chartContainer",
    {
      
       
      title:{
        //text: "Last 7 Days Order Report",
        fontSize:20,
        titleFontFamily: "Open Sans, sans-serif"
      },
      
                        animationEnabled: true,
      axisX:{

        gridColor: "Silver",
        tickColor: "silver"
        //valueFormatString: "DD/MMM"

      },                        
                        toolTip:{
                          shared:true
                        },
      theme: "theme2",
      axisY: {
        gridColor: "Silver",
        tickColor: "silver"
      },
      legend:{
        verticalAlign: "center",
        horizontalAlign: "right"
      },
      data: [
      {        
        type: "line",
        showInLegend: true,
        lineThickness: 2,
        name: "Orders",
        markerType: "square",
        color: "#F08080",
        dataPoints: dps
      }     
      ],
      axisX: {
        title: "Last 7 days",
       // titleFontFamily: "comic sans ms"
      },
      axisY: {
        title: "No of Booking",
        //titleFontFamily: "comic sans ms"
      },
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
    });

chart.render();
}
</script>



  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Recent Booking</h4>
                            </div>
                            <div class="content">
                                <table class="" style="width:100%">
                    <tr>
                      <th>
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Booking Date</p>
                       </th>
             <th>
                       
                          <p>Amount</p>
                       
                      </th>
            
            <th>
                       
                          <p>Status</p>
                       
                      </th>
                    </tr>
          
          <?php 
          if(!empty($booking)){
            foreach($booking as $book){?>
            <tr height="20"></tr>
                      <tr>
                        <td>
                         <?php echo $book->name;?>
                        </td>
                        <td>
                         <?php echo $book->booking_date;?>
                        </td>
              
              <td>
                         
                         <?php echo $book->total_amt.' '.$setting[0]->site_currency;?>
                        </td>
              
              <td>
                         <?php echo $book->status;?>
                        </td>
                      </tr>
            <?php } } ?>
                  </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Latest Users</h4>
                            </div>
                            <div class="content">
                                <table class="" style="width:100%">
                    <tr>
          <th>
                       
                          <p>Photo</p>
                       
                      </th>
          
                      <th>
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Phone</p>
                       </th>
             <th>
                       
                          <p>User Type</p>
                       
                      </th>
            
            
                    </tr>
          
          <?php 
          $viewst = "";
          if(!empty($users)){
            foreach($users as $user){
              $sta=$user->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; }
              ?>
            <tr height="10"></tr>
                      <tr>
                        <?php 
               $userphoto="/userphoto/";
              $path ='/local/images'.$userphoto.$user->photo;
              if($user->photo!=""){
              ?>
               <td><img src="<?php echo $url.$path;?>" class="thumb" width="40"></td>
               <?php } else { ?>
                <td><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="40"></td>
               <?php } ?>
                        <td>
                         <?php echo $user->name;?>
                        </td>
              
              <td>
                        <?php echo $user->phone;?>
                        </td>
              
              <td>
                         <?php echo $viewst;?>
                        </td>
                      </tr>
            <?php } } ?>
                  </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Top Testimonials</h4>
                            </div>
                            <div class="content">
                                <table class="" style="width:100%">
                    <tr>
          <th style="width:25%">
                       
                          <p>Photo</p>
                       
                      </th>
          
                      <th style="width:25%">
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Description</p>
                       </th>
             
            
            
                    </tr>
          
          <?php 
          if(!empty($testimonials)){
            foreach($testimonials as $testimonial){
              ?>
            <tr height="20"></tr>
                      <tr>
                        <?php 
               $testimonialphoto="/testimonialphoto/";
              $path ='/local/images'.$testimonialphoto.$testimonial->image;
              if($testimonial->image!=""){
              ?>
               <td><img src="<?php echo $url.$path;?>" class="thumb" width="40"></td>
               <?php } else { ?>
                <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="40"></td>
               <?php } ?>
                        <td>
                         <?php echo $testimonial->name;?>
                        </td>
              
              <td>
                        <?php echo substr($testimonial->description,0,40);?>
                        </td>
              
              
                      </tr>
            <?php } } ?>
                  </table>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection
