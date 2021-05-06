<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{title}</title>
  <link href="<?php echo base_url();?>template/assets/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url();?>template/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>template/assets/fontawesome/css/all.css" rel="stylesheet">
  </head>
 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 <script src="<?php echo base_url();?>template/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/custom_map.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/mobile.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/autocomplete.js"></script>
 <script src="<?php echo base_url();?>template/assets/js/bootstrap.bundle.min.js"></script>

 <div id="head">
   <div class="col-lg-12 col-md-12 row">
     <div class="col-lg-8 col-md-8">
 <b>CRIME MAPPING SYSTEM</b>
 </div> <div class="col-lg-4 col-md-4">
 <?php if(isset($name)): ?>
 <b style="float: right;">{name} - <a href="<?php echo base_url();?>logout" style="color:#fcc;">Logout </a></b>
 <?php else: ?>
   <b style="float:right;"><a href="<?php echo base_url();?>login" style="color:#fff;"> </a></b>
 <?php endif;?>
 </div>
 </div>
 </div>

 <div id="menu-user">
   <div class="mobile_nav">
     <span class="bars" data-trigger="navbar_main" id="show"><i class="fas fa-bars"></i></span>
     <span class="bars btn-close" id="hide" style="display:none"><i class="fas fa-bars"></i></span>
     <span class="round bg-danger" style="float:right"><i class="fas fa-bell"></i></span>

   <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg  bg-light">
 <div class="navbar-collapse" id="navbarSupportedContent">
   <div class="row text-center center mt-3">
   <div class="round-bg bg-primary"><i class="fas fa-user"></i></div>
 </div>
 <h4 class="welcome mb-5">Welcome Kenneth!
<hr></h4>
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url();?>dashboard/index"><i class="fas fa-home"></i> &nbsp; Dashboard <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>dashboard/report_crime"><i class="fas fa-bell"></i> &nbsp; Report Crime</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>dashboard/crime_reports"><i class="fas fa-home"></i> &nbsp; Your reports</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#"><i class="fas fa-user"></i> &nbsp; Profile</a>
     </li>
   </ul>
 </div>
</nav>
</div>
</div>
   <span class="screen-darken"></span>


 <div class="container-fluid text-center">
 <div id="side">
 <ul class="nav flex-column nav-custom">
   <li class="nav-item">
     <a class="nav-link active" href="<?php echo base_url();?>dashboard/index">
       <img class="logo" src="<?php echo base_url();?>template/assets/uniuyo.png"></img></a>
   </li>
   <li class="nav-item">
     <a class="nav-link active" href="<?php echo base_url();?>dashboard/index">
       <i class="fas fa-home"></i><br>
       Dashboard</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="<?php echo base_url();?>dashboard/report_crime">
         <i class="fas fa-bell"></i><br>
         Report Crime</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="<?php echo base_url();?>dashboard/crime_reports">
         <i class="fas fa-bell"></i><br>
         Your Reports</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="#">
         <i class="far fa-user"></i><br>
         Profile</a>
   </li>
     <?php if(isset($name)):?>
   <?php if($rights=='admin'):?>
   <li class="nav-item">
     <a class="nav-link" href="#">
         <i class="fas fa-user-shield"></i><br>
         Administrator</a>
   </li>
 <?php endif;?>
 <?php endif;?>

 </ul>
 </div>
 </div>

<div id="main-body">
<div class="panel">
  <div class="panel-heading">
    <h4>Post Review</h4>
  </div>
  <div class="panel-body row">
    <div class="col-md-12 col-12">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
    <th>#</th>
    <th>Type</th>
    <th>Scene</th>
    <th>Date</th>
    <th>Time</th>
    </tr>
    </thead>
    <tbody>
    <?php if($reports==false): ?>
    <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
    <?php else: $i = 1;?>
    <?php  foreach($reports as $req): ?>
    <tr>
    <td><?php echo $i++.'.';?>
    <td><a href="#viewreport-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['type']; ?></a></td>
    <td><?php echo $req['location']; ?></td>
    <td><?php echo date("d F Y", strtotime($req['date']));?></td>
    <td><?php echo date("h:g:s A", strtotime($req['time']));?></td>

    <!-- delete contract -->
    </tr>
    <?php endforeach;?>
    <?php endif;?>
    </tbody>
    </table>
  </div>

</div>
<div id="map" style="display:none;"></div>

</div>
</div>
<script>
$(document).ready(function() {
  $('#loading').hide();
  $("#location").keyup(function(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('get_map_data');?>",
    data:'keyword='+$(this).val(),
    success: function(data){
  var map_data = data.split(',');
  //alert(data);
  autocomplete(document.getElementById("location"), map_data);

    }
    });
  });


  $('#report').on('click',function() {
  $('#loading').show();
  $.ajax({
  url: '<?php echo base_url('save_crime_report');?>',
  data: $('#form').serialize(),
  type: 'POST',
  success:function(data) {
  $('#loading').hide();
  if(data !=='true') {
    alert(data);
  }
  else if(data=='true') {
    alert('Your report has been logged successfully');
    window.location.href = '<?php echo base_url('crime_reports');?>';
  }
  }
  });
  });



});
</script>
