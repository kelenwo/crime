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
    <script src="<?php echo base_url();?>template/assets/js/dist.js"></script>
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


 <div id="menu">
   <div class="row">
     <div class="col-lg-5 col-md-5">
       <div class="col-auto" style="margin-left:0;">
         <form id="search_crime_reports" autocomplete="off">
         <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
         <div class="input-group borders mb-3 autocomplete">
           <div class="input-group-prepend">
             <span class="input-group-text input-group-custom">
               <i class="fas fa-search"></i>
             </span>
           </div>
           <input type="text" name="location" class="form-control input-group-custom" id="location" placeholder="Search Crime, Location">
           <span class="input-group-text input-group-custom" style="margin-left:-8px;">
             <button type="button" id="go" class="btn btn-primary">GO  <i id="loading" class="fas fa-spinner fa-spin"></i></button>
           </span>
         </div>
       </div>

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
          Crime Map</a>
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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>home/manage_users">
            <i class="fas fa-user-shield"></i><br>
            Manage Users</a>
      </li>
    </ul>
  </div>
</div>

<div id="main-body">
    <div class="row">
<div class="panel">
    <div class="col-md-12">
  <div class="panel-heading">
    <h4>Ongoing Crimes</h4>
  </div>
</div>
  <div class="panel-body">
<div class="col-lg-12 col-md-12 row">
      <?php foreach($reports as $req): ?>
<div class="col-lg-6 col-md-6">
<div class="card mt-2">
  <div class="card-body">
    <span class="mb-1"><strong><?php echo $req['type'];?></strong></span>
    <span class="f-right"><span id="id<?php echo $req['id'];?>"></span> metres away</span><br>
      <span style="color:green; font-weight:bold;" class="mb-1"><i class="fas fa-map-marker-alt text-danger"></i> <?php echo $req['location'];?></span>
      <span class="f-right"><?php echo $req['date'];?> @ <?php echo $req['time'];?></span>

      <hr>
    <div class="text-center"><p class="card-text"><?php echo $req['description'];?>
      </p>
<a class="btn btn-primary btn-block" href="<?php echo base_url();?>home/view_crime/review/<?php echo $req['report_id'];?>"> View Details</a>
  </div>

</div>
</div>
</div>

<script>
$(document).ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
          var lat2 = position.coords.latitude;
          var lng2 = position.coords.longitude;
          var lat1 = <?php echo $req['latitude'];?>;
          var lng1 = <?php echo $req['longitude'];?>;
        var distance = Math.round(haversine_distance(lat1,lat2,lng1,lng2));
        //alert(distance);
        $('#id<?php echo $req['id'];?>').html(distance);

      },

      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );

  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

});
</script>
<?php endforeach;?>
</div>
</div>
</div>
<div id="map" style="display:none;"></div>

</div>
</div>
</div>
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

  //Trigger the search
  $('#go').on('click', function() {
    $('#loading-record').show();
    $('#loading').show();
    $.ajax({
    url: '<?php echo base_url('home/search_crime_reports');?>',
    data: $('#search_crime_reports').serialize(),
    type: 'POST',
    dataType: 'JSON',
    success:function(data) {
        //  alert(data[1].latitude);
    $('#loading-record').hide();
    $('#loading').hide();
        if(data=='false') {
    $('#records').html('0 Record');
  } else {
    $.ajax({
    url: '<?php echo base_url('home/get_map_data_where');?>',
    data: $('#search_crime_reports').serialize(),
    type: 'POST',
    dataType: 'JSON',
    success:function(block) {
$('#lat').val(block.latitude);
$('#long').val(block.longitude);
$('#ref').trigger('click');
    }
  });
    var len = data.length;
    if(len>1) {
      $('#records').html(len+ '&nbsp;Records');
    } else if(len=1) {
        $('#records').html(len+ '&nbsp;Record');
      }
    }
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
    zoom: 16,
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
if(status=="active") {
var icon = '<?php echo base_url();?>template/assets/marker-red.png';
var color = 'red';
} else if(status=="saved") {
var icon = '<?php echo base_url();?>template/assets/marker-black.png';
var color = '#111';
}
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
  });

get_result();

$('#ref').on('click', function() {
  var lat = parseFloat(document.getElementById('lat').value);
  var lng = parseFloat(document.getElementById('long').value);
  var block = $('#location').val();
const myLatLng = { lat: lat, lng: lng };
const map = new google.maps.Map(document.getElementById("map"), {
zoom: 16,
center: myLatLng,
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

const infowindow = new google.maps.InfoWindow({
content: block,
});
const marker = new google.maps.Marker({
position: myLatLng,
map,
label: "C",
});
infowindow.open(map, marker);

});
map.setOptions({ styles: styles["hide"] });

}
const styles = {
  default: [],
  hide: [
    {
      featureType: "all",
      elementType: "labels",
      stylers: [{ visibility: "off" }],
    },

  ],
};

function createMarker(place) {
  if (!place.geometry || !place.geometry.location) return;
  const marker = new google.maps.Marker({
    map,
    position: place.geometry.location,
    animation: google.maps.Animation.DROP,
  });

  google.maps.event.addListener(marker, "click", toggleBounce, () => {
    infowindow.setContent(place.name || "");
    infowindow.open(map);
  });


}


function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
</script>
