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


<div class="container-fluid text-center">
<div id="side-login">
  <div class="row">
<div class="col-lg-12 col-md-12">
  <div class="custom-login-body">
    <form id="login">
  <input type="email" name="email" class="form-control form-noborder" placeholder="Email">
  <input type="password" name="password" class="form-control form-noborder" placeholder="Password">
  <button type="button"id="submit" class="btn btn-primary btn-block login-btn">Login <i id="loading" class="fas fa-cog fa-spin"></i></button>
</form>
</div>
<p class="mt-3"> Dont have an Account? <a href="<?php echo base_url('home/ucp/register');?>">REGISTER HERE</a></p>
</div>
</div>
</div>
</div>

<div id="main-login">
<div id="map"></div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function () {
  $('#loading').hide();
  $('#submit').click(function() {
  $('#loading').show();
  $.ajax({
  url: '<?php echo base_url('login_user');?>',
  data: $('#login').serialize(),
  type: 'POST',
  success:function(data) {
  $('#loading').hide();
  if(data !=='true') {
    alert(data);
  }
  else if(data=='true') {
    window.location.href = '<?php echo base_url();?>';
  }
  }
  });
  });
});
</script>
