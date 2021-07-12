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
    <div class="col-lg-12 col-md-12 row">
      <div class="col-lg-8 col-md-8">
        <a class="" href="<?php echo base_url();?>">
          <img class="logo mr-2" src="<?php echo base_url();?>template/assets/uniuyo.png"></img>
  <b class="mt-1">CRIME MAPPING SYSTEM</b></a>
  </div> <div class="col-lg-4 col-md-4">
  <?php if(isset($name)): ?>
  <b style="float: right;">{name} - <a href="<?php echo base_url();?>logout" style="color:#fcc;">Logout </a></b>
  <?php else: ?>
    <b style="float:right;"><a href="<?php echo base_url();?>login" style="color:#fff;">Login </a></b>
  <?php endif;?>
  </div>
  </div>
  </div>

<div id="menu">
  <div class="row">
    <div class="col-lg-5 col-md-5">
      <div class="col-auto" style="margin-left:-5%; display:none;">
        <form id="search" method="post" action="<?php echo base_url('home/index');?>">
        <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text input-group-custom">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" name="location" class="form-control input-group-custom" id="pac-input" placeholder="Search Crime, Location">
          <span class="input-group-text input-group-custom" style="margin-left:-8px;">
            <button type="submit" id="submit" class="btn btn-primary">GO</button>
          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-7">
      <div class="omenu ml-15">
        <span></span>
    </div>
    </div>
  </div>
</div>
</form>
<div class="container-fluid text-center">
<div id="side">
  <ul class="nav flex-column nav-custom">
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo base_url();?>home/index">
        <i class="fas fa-home"></i><br>
        Crime Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>home/ongoing_crimes">
          <i class="fas fa-bell"></i><br>
          Ongoing Crimes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('generate_report');?>">
          <i class="far fa-file-export"></i><br>
          Generate Report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('crime_reports');?>">
          <i class="far fa-file-export"></i><br>
          Crime Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>home/manage_users">
          <i class="fas fa-user-shield"></i><br>
          Manage Users</a>
    </li>
  </ul>
</div>
</div>

<div id="main-body">
<div class="panel">
  <div class="panel-heading">
    <h4 style="display:inline-block;">Generate Report</h4>
  </div>
    <form method="post" action="<?php echo base_url('home/generate_record');?>" target="_blank">
  <div class="panel-body">
    <div class="m-2 row">

<div class="form-group col-md-6">
  <label>Start date</label>
  <input name="start-date" type="date" value="<?php $date = date('2021/01/01'); echo date("Y-m-d", strtotime($date) );?>" class="form-control" placeholder="date">

</div>

<div class="form-group col-md-6">
  <label>End date</label>
  <input name="end-date" type="date" value="<?php $date = date('Y/m/d'); echo date("Y-m-d", strtotime($date) );?>" class="form-control" placeholder="date">

</div>
<div class="col-md-12 mt-3">
<label>Filter by Type</label>
</div>
<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="Assault" id="defaultCheck1" checked>
<label class="form-check-label" for="defaultCheck1">
Assault
</label>
</div>
<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="Consfiscation" id="defaultCheck2" checked>
<label class="form-check-label" for="defaultCheck2">
Confiscation
</label>
</div>
<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="Drugs/Alcohol Violation" id="defaultCheck3" checked>
<label class="form-check-label" for="defaultCheck3">
Drugs/Alcohol Violation
</label>
</div>

<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value=" Exam Malpractice" id="defaultCheck4" checked>
<label class="form-check-label" for="defaultCheck4">
Exam Malpractice
</label>
</div>
<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="Robbery" id="defaultCheck5" checked>
<label class="form-check-label" for="defaultCheck5">
Robbery
</label>
</div>
<div class="form-check mb-1 mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="Murder" id="defaultCheck6" checked>
<label class="form-check-label" for="defaultCheck6">
Murder
</label>
</div>
<div class="form-check mr-3">
<input class="form-check-input" name="type[]" type="checkbox" value="others" id="defaultCheck7" checked>
<label class="form-check-label" for="defaultCheck7">
Others
</label>
</div>

</div>
<div class="col-md-6">
  <button type="submit" class="btn btn-primary ">Generate Report</button>
</div>
</form>
</div>
</div>
<div id="map" style="display:none;"></div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
