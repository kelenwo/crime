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
  <b>CRIME MAPPING SYSTEM</b>
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
      <div class="col-auto" style="margin-left:-5%;">
        <form id="search" method="post" action="<?php echo base_url('home/crime_search/location');?>">
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
    <h4 style="display:inline-block;">YOUR REPORTS &nbsp;
      |&nbsp;&nbsp;</h4><h4 style="display:inline-block;"><a href="<?php echo base_url();?>report_crime">Report Crime</a></h4>
  </div>
  <div class="panel-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
  <tr>
    <th>#</th>
    <th>Type</th>
    <th>Description</th>
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
<td><?php echo $req['description']; ?></td>
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
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
