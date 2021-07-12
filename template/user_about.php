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
<link href="<?php echo base_url();?>template/assets/css/all.css" rel="stylesheet">
  </head>
 <script src="<?php echo base_url();?>template/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/custom_map.js"></script>
    <script src="<?php echo base_url();?>template/assets/js/dist.js"></script>
       <script src="<?php echo base_url();?>template/assets/js/fa.js"></script>
 <script src="<?php echo base_url();?>template/assets/js/bootstrap.bundle.min.js"></script>

 <div id="head">
   <div class="col-lg-12 col-md-12 row">
     <div class="col-lg-8 col-md-8">
       <a class="" href="<?php echo base_url();?>">
         <img class="logo mr-2" src="<?php echo base_url();?>template/assets/uniuyo.png"></img>
 <b class="mt-1">CRIME MAPPING SYSTEM</b></a>
 </div> <div class="col-lg-4 col-md-4">
 <?php if(isset($name)): ?>
 <b style="float: right;">{name} - <a href="<?php echo base_url();?>ucp/login/logout" style="color:#fcc;">Logout </a></b>
 <?php else: ?>
   <b style="float:right;"><a href="<?php echo base_url();?>login" style="color:#fff;">Login </a></b>
 <?php endif;?>
 </div>
 </div>
 </div>

  <div id="menu-user">
    <div class="mobile_nav">
      <span class="bars" data-trigger="navbar_main" id="show"><i class="fas fa-bars"></i></span>
      <span class="bars btn-close" id="hide" style="display:none"><i class="fas fa-bars"></i></span>
      <span class="round bg-danger" style="float:right"><a href="<?php echo base_url();?>dashboard/report_crime">
        <i class="fas fa-bell"></i></a></span>

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
        <a class="nav-link" href="<?php echo base_url();?>dashboard/crime_reports"><i class="far fa-address-book"></i> &nbsp; Your reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>dashboard/about"><i class="fas fa-info-circle"></i> &nbsp; About</a>
      </li>
      <?php if(isset($name)):?>
    <?php if($rights=='administrator'):?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>home/index"><i class="fas fa-user"></i> &nbsp; Admin Panel</a>
      </li>
    <?php endif;?>
    <?php  endif;?>
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
          <i class="far fa-address-book"></i><br>
          Your Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>dashboard/about">
          <i class="fas fa-info-circle"></i><br>
          About</a>
    </li>

      <?php if(isset($name)):?>
    <?php if($rights=='administrator'):?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>home/index">
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
    <h4>About</h4>
  </div>
  <div class="panel-body row">
    <div class="col-md-12">


<div class="card mt-2">
  <div class="card-body">
<h2> About content goes here!</h2>

</div>
</div>

</div>

</div>
<div id="map" style="display:none;"></div>

</div>
</div>

<script>
$(document).ready(function() {

$('#hide').hide();
$('#show').click(function() {
$('#hide').show();
$('#show').hide();
});

$('#hide').click(function() {
$('#hide').hide();
$('#show').show();
});
});
function darken_screen(yesno){
  if( yesno == true ){
    document.querySelector('.screen-darken').classList.add('active');
  }
  else if(yesno == false){
    document.querySelector('.screen-darken').classList.remove('active');
  }
}

function close_offcanvas(){
  darken_screen(false);
  document.querySelector('.mobile-offcanvas.show').classList.remove('show');
  document.body.classList.remove('offcanvas-active');
}

function show_offcanvas(offcanvas_id){
  darken_screen(true);
  document.getElementById(offcanvas_id).classList.add('show');
  document.body.classList.add('offcanvas-active');
}

document.addEventListener("DOMContentLoaded", function(){

  document.querySelectorAll('[data-trigger]').forEach(function(everyelement){
    let offcanvas_id = everyelement.getAttribute('data-trigger');
    everyelement.addEventListener('click', function (e) {
      e.preventDefault();
          show_offcanvas(offcanvas_id);
    });
  });

  document.querySelectorAll('.btn-close').forEach(function(everybutton){
    everybutton.addEventListener('click', function (e) {
          close_offcanvas();
      });
  });

  document.querySelector('.screen-darken').addEventListener('click', function(event){
    close_offcanvas();
  });

});
</script>
