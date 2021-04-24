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
 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 <script src="<?php echo base_url();?>template/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/custom_map.js"></script>


<div id="head">
<b>CRIME MAPPING SYSTEM</b>
</div>

<div id="menu">
  <div class="row">
    <div class="col-lg-5 col-md-5">
      <div class="col-auto" style="margin-left:-5%;">


      </div>
    </div>
    <div class="col-lg-7 col-md-7">
      <div class="omenu ml-" style="float: right; margin-right:20px;">
      <span class="mt-1"><i class="fab fa-filter"></i> Hello, John</span>
    </div>
    </div>
  </div>
</div>

<div class="container-fluid text-center">
<div id="side">
  <ul class="nav flex-column nav-custom">
    <li class="nav-item">
      <a class="nav-link active" href="#">
        <img class="logo" src="<?php echo base_url();?>template/assets/uniuyo.png"></img></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#">
        <i class="fas fa-home"></i><br>
        Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>home/ongoing_crimes">
          <i class="fas fa-bell"></i><br>
          Ongoing Crimes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
          <i class="far fa-file-export"></i><br>
          Generate Report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">
          <i class="fas fa-user-shield"></i><br>
          Administrator</a>
    </li>
  </ul>
</div>
</div>

<div id="main-body">
<div class="panel">
  <div class="panel-heading">
    <h4 style="display:inline-block;">Report Crime &nbsp;
      |&nbsp;&nbsp;</h4><h4 style="display:inline-block;"><a href="">Your reports</a></h4>
  </div>
  <div class="panel-body">


<div id="map" style="display:none;"></div>
</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
