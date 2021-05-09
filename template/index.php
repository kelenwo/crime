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
  <script src="<?php echo base_url();?>template/assets/js/autocomplete.js"></script>
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
       <div class="col-auto" style="margin-left:0;">
         <form id="search" method="post" action="<?php echo base_url('home/crime_search/location');?>" autocomplete="off">
         <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
         <div class="input-group mb-3 autocomplete">
           <div class="input-group-prepend">
             <span class="input-group-text input-group-custom">
               <i class="fas fa-search"></i>
             </span>
           </div>
           <input type="text" name="location" class="form-control input-group-custom" id="location" placeholder="Search Crime, Location">
           <span class="input-group-text input-group-custom" style="margin-left:-8px;">
             <button type="submit" id="go" class="btn btn-primary">GO  <i id="loading" class="fas fa-spinner fa-spin"></i></button>
           </span>
         </div>
       </div>
     </form>

     </div>
     <div class="col-lg-7 col-md-7">
       <div class="omenu ml-15">
         <span>
       <button type="button" class="btn btn-primary"><div id="records">0 Records</div> <i id="loading-record" class="fas fa-spinner fa-spin"></i></button></span>
       <span class="mt-"><small>Date Range:</small>
            <a class="m" style="color:#383192;" id="sort-by-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Yesterday</a>
           <div class="dropdown-menu" aria-labelledby="sort-by-date">
             <a class="dropdown-item" href="#">Action</a>
             <a class="dropdown-item" href="#">Another action</a>
             <a class="dropdown-item" href="#">Something else here</a>
           </div>
         </span>
       <span class="mt-1"><a id="filter" style="color:#383192;"><i class="fas fa-filter"></i> Filter</a></span>
     </div>
     </div>
   </div>
 </div>
 </form>
<div class="text-center">
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
      <a class="nav-link" href="<?php echo base_url();?>home/manage_users">
          <i class="fas fa-user-shield"></i><br>
          Manage Users</a>
    </li>
  <?php endif;?>
<?php endif;?>
  </ul>
</div>
</div>

<div id="main-body" class="container">
<div id="map"></div>
</div>

<input type="hidden" id="lat" >
<input type="hidden" id="long">
<button id="ref" type="button" style="display:none"></button>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function(){
  $('#loading-record').hide();
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
});

function get_result() {

  $.ajax({
  url: '<?php echo base_url('home/get_crimes');?>',
  type: 'GET',
  dataType: 'JSON',
  success:function(crimes) {
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: new google.maps.LatLng(5.028829, 7.978997),
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
   for (i = 0; i < crimes.length; i++) {
     var lat = parseFloat(crimes[i].latitude);
     var lng = parseFloat(crimes[i].longitude);
     var block = crimes[i].location;
     var status = crimes[i].status;
     var report_id = crimes[i].report_id;
//alert(report_id);

var icon = '<?php echo base_url();?>template/assets/marker-red.png';
var color = '#111';
   const myLatLng = { lat: lat, lng: lng };

   const infowindow = new google.maps.InfoWindow({
   content: block,
   });
   const marker = new google.maps.Marker({
   position: myLatLng,
   map,
   animation: google.maps.Animation.DROP,
   icon: {
  labelOrigin: new google.maps.Point(16,64),
  url: icon
},
title: report_id,
  label: {
    text: block,
    color: color,
    fontWeight: "",
    fontSize: "12px"
}
   });
   infowindow.open(map, marker);
  // marker.addListener("click", () => {
//     window.location.href = '<?php echo base_url();?>home/view_crime/review/'+report_id;
//   });
//alert(marker['title']);
marker.addListener("click", () => {
  infowindow.close();
  window.location.href = '<?php echo base_url();?>home/view_crime/review/'+marker['title'];
});
   google.maps.event.addListener(marker, "click", toggleBounce, () => {
     infowindow.setContent(place.name || "");
     infowindow.open(map);
   });

}
}
});
}

let map;
let service;
let infowindow;

function initMap() {
  const home = new google.maps.LatLng(5.028829, 7.978997);
  infowindow = new google.maps.InfoWindow();
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

get_result();

}


function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
</script>
