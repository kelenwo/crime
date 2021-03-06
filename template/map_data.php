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
      <?php if(isset($name)):?>
    <?php if($rights=='admin'):?>
    <li class="nav-item">
      <a class="nav-link" href="#">
          <i class="fas fa-user-shield"></i><br>
          Administrator
210428-214IYF
        </a>
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
    <h4 style="display:inline-block;">Add Map Data &nbsp;
      |&nbsp;&nbsp;</h4><h4 style="display:inline-block;"><a href="<?php echo base_url();?>home/crime_reports">Your reports</a></h4>
  </div>
  <form id="form">
  <div class="panel-body">
    <div class="col-md-10">
    <div class="form-group">
      <label for="type">Block Name</label>
      <input type="text" name="blocks" class="form-control" id="pac-input" placeholder="Block Name" required>
    </div>
  </div>

  <div class="col-md-10">
  <div class="form-group">
    <label for="type">Latitude</label>
    <input type="text" name="latitude" class="form-control" id="pac-input" placeholder="Block Name" required>
  </div>
</div>

<div class="col-md-10">
<div class="form-group">
  <label for="type">Longitude</label>
  <input type="text" name="longitude" class="form-control" id="pac-input" placeholder="Block Name" required>
</div>
</div>

  <div class="col-md-10">
  <div class="form-group">
  <button type="button" id="report" class="btn btn-primary">&nbsp;&nbsp;&nbsp;Submit&nbsp;<i id="loading" class="fas fa-cog fa-spin"></i> &nbsp;&nbsp;</button>
  </div>
</div>
</form>

<div id="map" style="display:none;"></div>
</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function() {
$('#loading').hide();

$('#report').on('click',function() {
$('#loading').show();
$.ajax({
url: '<?php echo base_url('save_map_data');?>',
data: $('#form').serialize(),
type: 'POST',
success:function(data) {
$('#loading').hide();
if(data !=='true') {
  alert(data);
}
else if(data=='true') {
  alert('Map data has been logged successfully');
}
}
});
});

});
</script>
