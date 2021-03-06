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
  <script src="<?php echo base_url();?>template/assets/js/mobile.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/autocomplete.js"></script>
 <script src="<?php echo base_url();?>template/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>template/assets/js/fa.js"></script>

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
    <h4>Report Crime</h4>
  </div>
  <div class="panel-body row">
    <div class="col-md-12 col-12">
      <form id="report_crime">
      <div class="form-group">
        <label>Crime</label>
    <select name="type" class="form-control">
      <option>-Select-</option>
      <option value="Assault">Assault</option>
      <option value="Confiscation">Confiscation</option>
      <option value="Exam Malpractice">Exam Malpractice</option>
      <option value="Drugs/Alcohol Violation">Drugs/Alcohol Violation</option>
      <option value="Robbery">Robbery</option>
      <option value="Murder">Murder</option>
      <option value="Fire Outbreak">Fire Outbreak</option>
      <option value="Others">Others</option>
    </select>
      </div>

      <div class="form-group autocomplete">
        <label>Crime Scene is closest to</label>
      <input name="location" id="location" type="text" class="form-control" placeholder="Search Scene">
      </div>

      <div class="form-group">
        <label>Date</label>
      <input name="date" type="date" value="<?php $date = date('Y/m/d'); echo date("Y-m-d", strtotime($date) );?>" class="form-control" placeholder="date">
      </div>
      <div class="form-group">
        <label>Time</label>
      <input name="time" type="time" value="<?php date_default_timezone_set("Africa/Lagos"); echo date('H:i:s');?>" class="form-control" placeholder="time">
      </div>
      <div class="form-group">
        <label>Latitude</label>
      <input name="latitude" id="latitude" type="text" class="form-control" placeholder="Latitude">
      </div>
      <div class="form-group">
        <label>Longitude</label>
      <input name="longitude" id="longitude" type="text" class="form-control" placeholder="Longitude">
      </div>
      <div class="form-group">
      <label for="">Attach Image</label>
      <br><b id="loading-doc" style="color:green;"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
      <b id="success"></b>
      <div class="input-group">
        <div class="input-group-prepend">
              <button id="uploadImg" class="btn btn-primary" type="button">&nbsp;&nbsp;
                <i class="fas fa-upload fa-sm"></i> Select file&nbsp;&nbsp;&nbsp;
              </button>
            </div>
<input type="text" id="img" class="form-control form-control-user small" placeholder="Attach image">
<input type="hidden" name="crime_image" id="crime_image">
            </div></div>
      <div class="form-group">
        <label>Description</label>
      <textarea cols="3" class="form-control" name="description" placeholder="Description (optional)"></textarea>
      </div>
      <input type="hidden" name="status" value="active">
      <input type="hidden" name="report_id" value="<?php echo time();?>">
      <input type="hidden" name="report_by" value="{name}">
      <button type="button" class="btn btn-primary btn-block"  id="report">Report Crime <i id="loading" class="fas fa-cog fa-spin"></i></button>
</div>
</form>
</div>
<div id="map" style="display:none"></div>
<form id="latt">
  <input type="hidden" name="latitude" id="lat">
</form>
<form id="uploadDoc">
<input type="file" name="doc" id="doc" style="visibility: hidden;">
</form>
</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function() {
  $('#loading').hide();
$('#loading-doc').hide();

$('#uploadImg').on('click',function() {
$('#doc').trigger('click');
});

  $('#doc').on('change',function() {
    $('#loading-doc').show();
  $('#uploadDoc').submit();
  });

  //Document 1
  $('#uploadDoc').submit(function(e){
    $('#loading-doc').show();
    ????????????????????????e.preventDefault();
  ??$.ajax({
    ??????url:'<?php echo base_url();?>dashboard/do_upload',
    ??????type: 'POST',
    ??????data:new FormData(this),
    ??????processData:false,
    ??????contentType:false,
    ??????cache:false,
       dataType: 'JSON',
    ??????async:false,
    ???? success: function(data){
    $('#loading-doc').hide();
    if(data.success=='true') {
      $('#success').html('<b class="mb-1"><i class="far fa-check-square" style="color:green; font-size:14px;"> Image Uploaded successfully</i></b>')
      $('#img').val(data.file_name);
      $('#crime_image').val(data.file_name);
      $('#confirm').removeAttr('disabled');
    } else if(data.success=='false') {
    $('#success').html('<i class="fa fa-info-circle" style="color:red;">'+data.msg+'</i>')
    }
    ????????}
    ????????????????});
    ??????????});


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
  url: '<?php echo base_url('dashboard/save_crime_report');?>',
  data: $('#report_crime').serialize(),
  type: 'POST',
  success:function(data) {
  $('#loading').hide();
  if(data !=='true') {
    alert(data);
  }
  else if(data=='true') {
    alert('Your report has been logged successfully');
    window.location.href = '<?php echo base_url('dashboard/crime_reports');?>';
  }
  }
  });
  });
  });
  
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
          $('#latitude').val(position.coords.latitude);
          $('#longitude').val(position.coords.longitude);

          $.ajax({
          url: '<?php echo base_url('home/get_map_data_all');?>',
          type: 'GET',
          dataType: 'JSON',
          success:function(block) {

            var counts = block.lat,
              goal =   $('#latitude').val();

            var closest = counts.reduce(function(prev, curr) {
              return (Math.abs(curr - goal) < Math.abs(prev - goal) ? curr : prev);
            });

            $('#lat').val(closest);
            $.ajax({
            url: '<?php echo base_url('home/get_map_data_block');?>',
            type: 'POST',
          data: $('#latt').serialize(),
            dataType: 'JSON',
            success:function(data) {
            //  alert(data);
            $('#location').val(data.blocks);
            }
          });
          }
        });

      },

      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );

  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  let map;
  let service;
  let infowindow;

  function initMap() {
    const home = new google.maps.LatLng(5.028829, 7.978997);
    infoWindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById("map"), {
      center: home,
      zoom: 15,
      styles: [
        {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
            { "visibility": "off" }
          ]
        }
      ]
    });

  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }
</script>
