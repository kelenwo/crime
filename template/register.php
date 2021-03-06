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
    <div class="panel-heading">
      <h4>Create Account</h4>
    </div>
<div class="col-lg-12 col-md-12">
  <div class="custom-login-body" style="margin-top: 0 !important;">
    <form class="user" id="register">
  <input type="text" name="name" class="form-control form-noborder" placeholder="Full name">
  <input type="email" name="email" class="form-control form-noborder" placeholder="Email">
    <input type="text" name="phone" class="form-control form-noborder" placeholder="Phone Number">
  <input type="password" id="password" name="password" class="form-control form-noborder" placeholder="Password">
  <input type="password" id="passconfirm" class="form-control form-noborder" placeholder="Repeat Password">
  <button type="button" id="submit" class="btn btn-primary btn-block login-btn" disabled>Create Account <i id="loading" class="fas fa-cog fa-spin"></i></button>
</form>
</div>
<p class="mt-3"> Have an Account? <a href="<?php echo base_url('ucp/login');?>">LOGIN HERE</a></p>
</div>
</div>
</div>
</div>

<!-- Edituser modal -->
<div class="modal fade" id="auth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12 mb-3">
<h3 class="d-inline">Your account has been created, Please check your email to verify your account</h3>
</div>

    </div>
    </div>
  </div>
</div>
<button style="display:none" id="authent" type="button" data-toggle="modal" data-target="#auth">
</button>
 <!-- Edituser modal end -->

<div id="main-login">
<div id="map"></div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
<script>
$(document).ready(function() {
$('#loading').hide();

//Confirm is the passwords match
$('#passconfirm').keyup(function() {
  var pass = $('#password').val();
  var passconfirm = $('#passconfirm').val();
if(pass==passconfirm) {
$('#submit').removeAttr('disabled');
} else if(pass !== passconfirm) {
$('#submit').attr('disabled','disabled');
}
});

$('#submit').click(function() {
$('#loading').show();
$.ajax({
url: '<?php echo base_url('ucp/login/save_user');?>',
data: $('#register').serialize(),
type: 'POST',
success:function(data) {
$('#loading').hide();
if(data==false) {
  alert(data);
}
else {
  $('#authent').trigger('click');
}
}
});
});

});
</script>
