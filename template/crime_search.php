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
        <form id="search_crime_reports">
        <label class="sr-only" for="inlineFormInputGroup">Search Crime, Location</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text input-group-custom">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" name="location" class="form-control input-group-custom" id="pac-input" placeholder="Search Crime, Location"
          <?php if($addr):?> value="{addr}" <?php endif;?>>
          <span class="input-group-text input-group-custom" style="margin-left:-8px;">
            <button type="button" id="go" class="btn btn-primary">GO  <i id="loading" class="fas fa-spinner fa-spin"></i></button>
          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-7">
      <div class="omenu ml-15">
        <span>
          <?php if($records==false) {
            $text = '0 Record';
          } else {
            $total = count($records);
            if($total > 1) {
            $text = $total. '&nbsp; Records';
          } else {
            $text = $total. '&nbsp; Record';
          }
          } ?>
      <button type="button" class="btn btn-primary"><div id="records"><?php echo $text;?></div> <i id="loading-record" class="fas fa-spinner fa-spin"></i></button></span>
      <span class="mt-"><small>Date Range:</small> <a style="color:#383192;" id="sort-by-date">Yesterday</a></span>
      <span class="mt-1"><a id="filter" style="color:#383192;"><i class="fas fa-filter"></i> Filter</a></span>
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
<div id="results"></div>
<div id="main-body">
  <div class="row">
  <input type="hidden" id="addr" value="{addr}">
<div id="map"></div>
</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<div id="reload">
<script>
$(document).ready(function(){
  $('#loading-record').hide();
  $('#loading').hide();

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
    $('#loading-record').hide();
    $('#loading').hide();
        if(data=='false') {
    $('#records').html('0 Record');
  } else {
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

function initAutocomplete() {

  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const submit = document.getElementById("submit");
  const searchBox = new google.maps.places.SearchBox(input);
const options = {
  componentRestrictions: { country: "NG" },
  fields: ["formatted_address", "geometry", "name"],
  origin: map.getCenter(),
  strictBounds: false,
  types: ["establishment"],
};
const autocomplete = new google.maps.places.Autocomplete(input, options);
// Bind the map's bounds (viewport) property to the autocomplete object,
// so that the autocomplete requests use the current map bounds for the
// bounds option in the request.
autocomplete.bindTo("bounds", map);
//  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

function buttonSearch() {
  const request = {
    query: $('#pac-input').val(),
    fields: ["name", "geometry"],
  };
  service = new google.maps.places.PlacesService(map);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(results[0].geometry.location);
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
  const request = {
    query: $('#addr').val(),
    fields: ["name", "geometry"],
  };
  service = new google.maps.places.PlacesService(map);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(results[0].geometry.location);
    }
  });

  google.maps.event.addDomListener(window, 'load', initAutocomplete);
  $('#submit').on('click',function() {
buttonSearch();
  });
}

function createMarker(place) {
  if (!place.geometry || !place.geometry.location) return;
  const marker = new google.maps.Marker({
    map,
    position: place.geometry.location,
  });
  google.maps.event.addListener(marker, "click", () => {
    infowindow.setContent(place.name || "");
    infowindow.open(map);
  });
}

</script>
</div>