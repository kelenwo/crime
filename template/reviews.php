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
    <script src="<?php echo base_url();?>template/assets/js/fa.js"></script>

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
        <div class="col-auto" style="margin-left:-5%;">
          <form id="search" method="post" action="<?php echo base_url('home/crime_search/location');?>">
          <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text input-group-custom">
                <i class="fas fa-search"></i>
              </span>
            </div>
            <input type="text" name="location" class="form-control input-group-custom" id="pac-inpu" placeholder="Search Crime, Location">
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
          <a class="nav-link" href="<?php echo base_url('crime_reports');?>">
              <i class="far fa-file-export"></i><br>
              Crime Reports</a>
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

      <?php if(!isset($name)):?>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">
            <i class="fas fa-user"></i><br>
            Login</a>
      </li>
    <?php endif;?>
      </ul>
    </div>
  </div>


<div id="main-body">
<div class="panel">
  <div class="panel-heading">
    <h4>Reviews</h4>
  </div>
  <div class="panel-body row">
    <div class="col-md-8">
    <ul class="nav nav-tabs nav-justified">
  <li class="nav-item">
    <a class="nav-link  active" href="#"><h5>REVIEWS</h5></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><h5>2</h5></a>
  </li>
</ul>
<?php if(empty($reviews)):?>
<div class="card mt-2">
  <div class="card-body text-center">

<h3>No Reviews Yet!!</h3>
</div>
</div>
<?php
else: ?>

<?php foreach($reviews as $res): ?>
<div class="card mt-2">
  <div class="card-body">
    <span class="f-right"><?php echo date("d F, Y", strtotime($res['date']));?></span><br>
    <div >
      <?php if($res['status']=='genuine'): ?>
      <span style="color:green; font-weight:bold; text-transform: capitalize;"><?php echo $res['status'];?> Report</span>
    <?php elseif($res['status']=='genuine'): ?>
      <span style="color:red; font-weight:bold; text-transform: capitalize;"><?php echo $res['status'];?> Report</span>
    <?php endif;?>
      <span style="float: right; font-weight:bold;"><?php echo $res['review_by'];?></span>
      <hr>
    <div class="">
      <?php if(empty($res['title'])): ?>
        <h5 class="card-title text-center">This report is true and correct</h5>
      <?php else: ?>
      <h5 class="card-title text-center"><?php echo $res['title'];?></h5>
    <?php endif;?>
    <?php if(empty($res['description'])): ?>
      <p class="card-text text-center">No description Added.</p>
        <?php else: ?>
          <p class="card-text"><?php echo $res['description'];?></p>
          <?php endif;?>
  </div>
</div>
</div>
</div>
<?php endforeach;
endif;?>


</div>
    <div class="col-md-4">
      <div class="card">
<div class="card-top">
  <div class="m-3 center text-white">
  <div class="mr-2" style="display:inline-block;font-size:50px;color:DodgerBlue"><i class="fad fa-location-circle"></i></i></div>
  <h4 style="display:inline-block"><?php echo $reports['type'];?></h4>
<hr>
  <span class="f-right"><?php echo $reports['location'];?></span><br>
  <span class="f-right"><?php echo date("d F, Y", strtotime($reports['date']));?> @ <?php echo date("h:i:s a", strtotime($reports['time']));?></span><br>
</div>
</div>
  <div class="card-body">
    <h5 class="card-title">Description</h5>
    <?php if(empty($res['description'])): ?>
      <p class="card-text text-center">No description Added.</p>
        <?php else: ?>
    <p class="card-text"><?php echo $reports['description'];?></p>
  <?php endif;?>
    <div class="row">
    <div class="col-md-6 col-sm-6 col-6"><button class="btn btn-outline-success my-2 my-sm-0 btn-block">
      <strong>Save</strong></button></div>
    <div class="col-md-6 col-sm-6 col-6"><button class="btn btn-outline-danger my-2 my-sm-0 btn-block">
      <strong>Blacklist</strong></button></div>
    </div>
  </div>
</div>
    </div>

<div id="map" style="display:none;"></div>

</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
