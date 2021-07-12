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
         <form id="search" autocomplete="off">
         <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
         <div class="input-group mb-3 autocomplete">
           <div class="input-group-prepend">
             <span class="input-group-text input-group-custom">
               <i class="fas fa-search"></i>
             </span>
           </div>
           <input type="text" name="location" class="form-control input-group-custom" id="location" placeholder="Search Crime, Location"
           <?php if($location):?> value="{location}"<?php endif;?>>
           <span class="input-group-text input-group-custom" style="margin-left:-8px;">
             <button type="button" id="go" class="btn btn-primary">GO  <i id="loading" class="fas fa-spinner fa-spin"></i></button>
           </span>
         </div>
       </div>
     </form>

     </div>
     <div class="col-lg-7 col-md-7">
       <div class="omenu mr-5 text-right">
         <span>
           <button type="button" class="btn btn-primary"><div id="records">0 records</div> <i id="loading-record" class="fas fa-spinner fa-spin"></i></button></span>
                <span class="mt-"><small>Date Range:</small>
            <a class="m" style="color:#383192;" id="sort-by-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b id="all">All Time</b> <i id="loading-date" class="fas fa-spinner fa-spin"></i></a>
           <div class="dropdown-menu" aria-labelledby="sort-by-date">
             <div class="dropdown-item cursor-pointer" id="all-time">All time</div>
             <div class="dropdown-item cursor-pointer" id="yesterday">Yesterday</div>
             <div class="dropdown-item cursor-pointer" id="3days-ago">3 Days ago</div>
             <div class="dropdown-item cursor-pointer" id="last-week">Last Week</div>
             <div class="dropdown-item cursor-pointer" id="last-month">Last Month</div>
             <div class="dropdown-item cursor-pointer" id="custom-range">Custom Range</div>
             <div class="dropdown-item cursor-pointer"  id="custom-range"><input type="date" id="startDate" class="form-control form-control-sm mb-1">
               <input type="date" id="endDate" class="form-control form-control-sm">
             <button type="button" id="custom-date" class="mt-1 btn btn-primary btn-sm btn-block">Submit</button></div>
           </div>
         </span>
       <span class="mt-1"><a id="filter" style="color:#383192;" data-toggle="modal" data-target="#filter-by-crime"><i class="fas fa-filter"></i> Filter</a></span>

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

<div id="main-body" class="container">
<div id="map"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="filter-by-crime" tabindex="-1" role="dialog" aria-labelledby="filter-crime" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="filter-crime">Filter by crime</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ml-2">
        <form id="filterBy">
        <div class="form-check mb-1">
    <input class="form-check-input" name="type[]" type="checkbox" value="Assault" id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
      Assault
    </label>
  </div>
  <div class="form-check mb-1">
  <input class="form-check-input" name="type[]" type="checkbox" value="Consfiscation" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    Confiscation
  </label>
</div>
  <div class="form-check mb-1">
  <input class="form-check-input" name="type[]" type="checkbox" value="Drugs/Alcohol Violation" id="defaultCheck3">
  <label class="form-check-label" for="defaultCheck3">
    Drugs/Alcohol Violation
  </label>
</div>
<div class="form-check mb-1">
<input class="form-check-input" name="type[]" type="checkbox" value=" Exam Malpractice" id="defaultCheck4">
<label class="form-check-label" for="defaultCheck4">
  Exam Malpractice
</label>
</div>
<div class="form-check mb-1">
  <input class="form-check-input" name="type[]" type="checkbox" value="Robbery" id="defaultCheck5">
  <label class="form-check-label" for="defaultCheck5">
    Robbery
  </label>
</div>
<div class="form-check mb-1">
  <input class="form-check-input" name="type[]" type="checkbox" value="Murder" id="defaultCheck6">
  <label class="form-check-label" for="defaultCheck6">
    Murder
  </label>
</div>
<div class="form-check mb-1">
  <input class="form-check-input" name="type[]" type="checkbox" value="Fire Outbreak" id="defaultCheck8">
  <label class="form-check-label" for="defaultCheck6">
    Fire Outbreak
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" name="type[]" type="checkbox" value="others" id="defaultCheck7">
  <label class="form-check-label" for="defaultCheck7">
    Others
  </label>
</div>
  <input type="hidden" name="start-date" id="start-date" value="first day of previous year">
  <input type="hidden" name="end-date" id="end-date" value="today">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="searchByCrime">Save changes <i id="loading-crime" class="fas fa-spinner fa-spin"></i></button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="lat" >
<input type="hidden" id="long">

<button id="ref" type="button" style="display:none"></button>
<button id="searchByDate" type="button" style="display:none"></button>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function(){

  //Hide all the loading Icons and only display them when neccessary
  $('#loading-record').hide();
  $('#loading').hide();
  $('#loading-crime').hide();
  $('#loading-date').hide();
  var location = $('#location').val();


if(location!=='') {
$('#go').trigger('click');
}
$('#all-time').on('click', function() {
get_result();
  $('#all').html('All Time');
});
$('#yesterday').on('click', function() {
  $('#start-date').val('yesterday');
  $('#end-date').val('today');
  $('#all').html('Yesterday');
  $('#searchByDate').trigger('click');
});
$('#3days-ago').on('click', function() {
  $('#start-date').val('-3 days');
  $('#end-date').val('today');
  $('#all').html('3 days ago');
  $('#searchByDate').trigger('click');
});
$('#last-week').on('click', function() {
  $('#start-date').val('last week sunday');
  $('#end-date').val('next monday');
  $('#all').html('Last week');
  $('#searchByDate').trigger('click');
});
$('#last-month').on('click', function() {
  $('#start-date').val('first day of previous month');
  $('#end-date').val('last day of previous month');
  $('#all').html('Last Month');
  $('#searchByDate').trigger('click');
});

$('#custom-date').on('click', function() {
  var start =   $('#startDate').val();
  var end = $('#endDate').val();
  $('#start-date').val(start);
  $('#end-date').val(end);
  $('#searchByDate').trigger('click');
});

//Search by date
$('#searchByDate').on('click',function() {

$('#loading-date').show();
    $.ajax({
    url: '<?php echo base_url('home/filter_date');?>',
    data: $('#filterBy').serialize(),
    type: 'POST',
    dataType: 'JSON',
    success:function(crimes) {
$('#loading-date').hide();
  $('#records').html(crimes.length +' record');
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
       var lat2 = 5.041476;
       var lng2 = 7.975939;
  //alert(report_id);

  var icon = '<?php echo base_url();?>template/assets/marker-red.png';
  var color = '#111';
     const myLatLng = { lat: lat, lng: lng };

     const infowindow = new google.maps.InfoWindow({
     content: crimes[i].type,
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
});

//Filter By crime
$('#searchByCrime').on('click',function() {
$('#loading-crime').show();
    $.ajax({
    url: '<?php echo base_url('home/filter_crime');?>',
    data: $('#filterBy').serialize(),
    type: 'POST',
    dataType: 'JSON',
    success:function(crimes) {
$('#loading-crime').hide();
  $('#records').html(crimes.length +' record');
$('.close').trigger('click');
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
       var lat2 = 5.041476;
       var lng2 = 7.975939;
  //alert(report_id);

  var icon = '<?php echo base_url();?>template/assets/marker-red.png';
  var color = '#111';
     const myLatLng = { lat: lat, lng: lng };

     const infowindow = new google.maps.InfoWindow({
     content: crimes[i].type,
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
});

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

let map;
let service;
let infowindow;

//Trigger the search
$('#go').on('click', function() {

  $('#loading').show();
  $.ajax({
  url: '<?php echo base_url('home/get_crimes');?>',
  type: 'GET',
  dataType: 'JSON',
  success:function(crimes) {
  $('#loading').hide();
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
     var lat2 = 5.041476;
     var lng2 = 7.975939;
     var loc = $('#location').val();
  //alert(report_id);

  if(loc==block) {
  var contentType = ' ';
  var blockType = block;
  var icon = '<?php echo base_url();?>template/assets/marker-pin.png';
} else {
  var contentType = crimes[i].type;
  var blockType = ' ';
  if(status=='saved') {
  var icon = '<?php echo base_url();?>template/assets/marker-black.png';
} else {
  var icon = '<?php echo base_url();?>template/assets/marker-red.png';
}
}
  var color = '#111';
   const myLatLng = { lat: lat, lng: lng };

   const infowindow = new google.maps.InfoWindow({
   content: contentType,
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
    text: blockType,
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
  if(loc==block) {
    infowindow.close();
  }
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
    $('#records').html(crimes.length+' records');
   for (i = 0; i < crimes.length; i++) {
     var lat = parseFloat(crimes[i].latitude);
     var lng = parseFloat(crimes[i].longitude);
     var block = crimes[i].location;
     var status = crimes[i].status;
     var report_id = crimes[i].report_id;
     var lat2 = 5.041476;
     var lng2 = 7.975939;
//alert(report_id);

if(status=='saved') {
var icon = '<?php echo base_url();?>template/assets/marker-black.png';
} else {
var icon = '<?php echo base_url();?>template/assets/marker-red.png';
}
var color = '#111';
   const myLatLng = { lat: lat, lng: lng };

   const infowindow = new google.maps.InfoWindow({
   content: crimes[i].type,
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
$('#ref').on('click', function() {
  var lat = parseFloat(document.getElementById('lat').value);
  var lng = parseFloat(document.getElementById('long').value);
  var block = $('#location').val();
  var icon = '<?php echo base_url();?>template/assets/marker-pin.png';
  var color = '#111';
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
 animation: google.maps.Animation.DROP,
icon: {
  labelOrigin: new google.maps.Point(16,64),
  url: icon
},
title: '',
  label: {
    text: block,
    color: color,
    fontWeight: "",
    fontSize: "12px"
  }
});

 map.setCenter(marker.getPosition())
get_result();
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
