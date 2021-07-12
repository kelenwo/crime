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
  <script src="<?php echo base_url();?>template/assets/js/fa.js"></script>
  <script src="<?php echo base_url();?>template/assets/js/custom_map.js"></script>
   <script src="<?php echo base_url();?>template/assets/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="<?php echo base_url();?>template/assets/js/datatables-demo.js"></script>
     <link href="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


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
      <div class="col-auto" style="margin-left:-5%;">
        <form id="search" method="post" action="<?php echo base_url('home/index');?>">
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

<div id="main-body">
<div class="panel">
  <div class="panel-heading">
    <h4 style="display:inline-block;">Manage Users &nbsp;
      </h4>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs nav-justified mb-5">
  <li class="nav-item">
    <a class="nav-link  active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true"><h5>Users</h5></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true"><h5>Administrators</h5></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="blocked-tab" data-toggle="tab" href="#blocked" role="tab" aria-controls="blocked" aria-selected="true"><h5>Blocked Users</h5></a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">

  <!-- Users Tab Start-->
  <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Reports</th>
    <th>False Reports</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php if($users==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($users as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewuser-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['name']; ?></a></td>
<td><?php echo $req['email']; ?></td>
  <td><?php echo $req['phone']; ?></td>
  <td><?php echo$req['reports'];?></td>
<td><?php echo$req['false_reports'];?></td>
<td class="actions">
  <a href="#edit_user_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="far fa-edit"></i></a>&nbsp;|
  <a id="del-user-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="far fa-trash-alt"></i></a></b>
  <form id="del_users-<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="type" value="users">
</form>
</td>

<!-- view user modal -->
<div class="modal fade" id="viewuser-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" style="font-size: 1.5em;">

      <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12 mb-3">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-user fa-stack-1x fa-inverse"></i>
</span> <h5 class="d-inline">User Information</h5>
</div>
<div class="col-sm-12 col-md-12 card  bg-light">
<div class="card-body" style="margin: -5px!important;">
<div class="row" style="font-size:20px !important;">
  <div class="col-sm-6 col-md-6 mt-3">
<div class="text-sm text-primary ml-3 text-capitalize mb-2"><small class="text-success">Full Name:</small>
<br>
<small><?php echo $req['name'];?></small></div>
          <div class="ml-3">
          <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Mobile Number:</small><br>
        <small><?php echo $req['phone'];?></small></div>

      <div class="text-sm text-primary mb-2"><small class="text-success">Email Address:</small><br>
    <small><?php echo $req['email'];?></small></div>

    <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crime Reviews:</small><br>
  <small><?php echo $req['reviews'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Last login:</small><br>
<small><?php echo $req['last_login'];?></small></div>


      </div></div>

        <div class="col-sm-5 col-md-5 ml-4 mt-3">
      <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Rights:</small><br>
    <small><?php echo $req['rights'];?></small></div>

    <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Account state:</small><br>
  <small><?php echo $req['account_status'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crimes Reported:</small><br>
<small><?php echo $req['reports'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-danger">False Reports:</small><br>
<small><?php echo $req['false_reports'];?></small></div>

    <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Date Joined:</small><br>
  <small><?php echo $req['date'];?></small></div>
        </div>
      </div>
    </div>
      </div>
<!-- General Information end -->

    </div>

      <div class="modal-footer">
        <div class="form-group text-center center">
          <button class="btn pl-3 pr-3 btn-danger" id="b-user-<?php echo $req['id'];?>"><i class="fas fa-ban"></i> Block </button>
          <button class="btn pl-3 pr-3 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
       </div>
      </div>
    </div>
  </div>
</div>
 <!-- view user modal end -->

 <!-- Edituser modal -->
 <div class="modal fade" id="edit_user_<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">

     <div class="modal-content" style="font-size: 1.5em;">

       <div class="modal-body">
 <!-- General Information start-->
 <div class="col-md-12 mb-3">
 <span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
 <i class="fas fa-circle fa-stack-2x"></i>
 <i class="far fa-user fa-stack-1x fa-inverse"></i>
 </span> <h5 class="d-inline">User Information</h5>
 </div>
 <div class="col-sm-12 col-md-12 card  bg-light">
 <div class="card-body" style="margin: -5px!important;">
 <div class="row" style="font-size:20px !important;">
   <div class="col-sm-6 col-md-6 mt-3">
 <div class="text-sm text-primary ml-3 text-capitalize mb-2"><small class="text-success">Full Name:</small>
 <br>
 <small><?php echo $req['name'];?></small></div>
<div class="ml-3">
 <div class="text-sm text-primary mb-2"><small class="text-success">Email Address:</small><br>
<small><?php echo $req['email'];?></small></div>

           <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success mb-1">Rights:</small><br>
             <form id="edit_user-<?php echo $req['id'];?>">
               <input type="hidden" name="id" value="<?php echo $req['id'];?>">
             <select name="rights" class="form-control">
               <option value="user" <?php if($req['rights']=='user') {echo 'selected';};?>>User</option>
               <option value="administrator" <?php if($req['rights']=='administrator') {echo 'selected';};?>>Administrator</option>
             </select></form></div>
       </div></div>

         <div class="col-sm-5 col-md-5 ml-4 mt-3">
       <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Mobile Number:</small><br>
     <small><?php echo $req['phone'];?></small></div>

     <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Account state:</small><br>
   <small><?php echo $req['account_status'];?></small></div>

     <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success ">Date Joined:</small><br>
   <small><?php echo $req['date'];?></small></div>
         </div>
       </div>
     </div>
       </div>
 <!-- General Information end -->

     </div>

       <div class="modal-footer">
         <div class="form-group text-center center">
           <button type="button" class="btn pl-5 pr-5 mr-3 btn-primary" id="save-user-edit-<?php echo $req['id'];?>"><i class="far fa-edit"></i> Save Edit <i class="fas fa-cog fa-spin" id="loadinguser-<?php echo $req["id"];?>"></i>&nbsp;</a>
           <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
        </div>
       </div>
     </div>
   </div>
 </div>
  <!-- Edituser modal end -->
<!-- delete contract -->
</tr>
<form id="b_users-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="account_status" value="blocked">
</form>
<script>
$(document).ready(function() {

$('#loadinguser-<?php echo $req["id"];?>').hide();
  $("#del-user-<?php echo $req['id'];?>").click(function(){
    if (confirm("Do you want to delete?")){
      $.ajax({
        url:'<?php echo base_url()."home/delete_item";?>',
        type: "POST",
        data: $('#del_users-<?php echo $req["id"];?>').serialize(),
        success:function(data) {
  if(data=='true') {
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
    alert(data);
  }
  }
  });
    } {
      return false;
    }
  });

  $("#b-user-<?php echo $req['id'];?>").click(function(){
    if (confirm("Do you want to block this user?")){
      $.ajax({
        url:'<?php echo base_url()."home/update_user";?>',
        type: "POST",
        data: $('#b_users-<?php echo $req["id"];?>').serialize(),
        success:function(data) {
  if(data=='saved') {
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
    alert(data);
  }
  }
  });
    } {
      return false;
    }
  });

  //Save Issue edit
  $("#save-user-edit-<?php echo $req['id'];?>").click(function() {
  $("#loadinguser-<?php echo $req['id'];?>").show();
  $.ajax({
    url:'<?php echo base_url()."home/update_user";?>',
    type: "POST",
    data: $("#edit_user-<?php echo $req['id'];?>").serialize(),
    success:function(data) {
  $("#loadinguser-<?php echo $req['id'];?>").hide();
    if(data=="saved") {
  alert('User data has been updated successfully!!');
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
    } else {
alert(data);
    }
    }
  });
  });
});
</script>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
</div>
<!-- Users Tab ENd -->

<!-- Admin Tab Start -->
<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
  <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Reports</th>
  <th>False Reports</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($users==false): ?>
<tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($admin as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewadmin-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['name']; ?></a></td>
<td><?php echo $req['email']; ?></td>
<td><?php echo $req['phone']; ?></td>
<td><?php echo$req['reports'];?></td>
<td><?php echo$req['false_reports'];?></td>
<td class="actions">
<a href="#edit_admin_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="far fa-edit"></i></a>&nbsp;|
<a id="del-admin-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="far fa-trash-alt"></i></a></b>
<form id="del_admin-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="type" value="users">
</form>
</td>

<!-- view user modal -->
<div class="modal fade" id="viewadmin-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">

  <div class="modal-content" style="font-size: 1.5em;">

    <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12 mb-3">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-user fa-stack-1x fa-inverse"></i>
</span> <h5 class="d-inline">User Information</h5>
</div>
<div class="col-sm-12 col-md-12 card  bg-light">
<div class="card-body" style="margin: -5px!important;">
<div class="row" style="font-size:20px !important;">
<div class="col-sm-6 col-md-6 mt-3">
<div class="text-sm text-primary ml-3 text-capitalize mb-2"><small class="text-success">Full Name:</small>
<br>
<small><?php echo $req['name'];?></small></div>
        <div class="ml-3">
        <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Mobile Number:</small><br>
      <small><?php echo $req['phone'];?></small></div>

    <div class="text-sm text-primary mb-2"><small class="text-success">Email Address:</small><br>
  <small><?php echo $req['email'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crime Reviews:</small><br>
<small><?php echo $req['reviews'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Last login:</small><br>
<small><?php echo $req['last_login'];?></small></div>


    </div></div>

      <div class="col-sm-5 col-md-5 ml-4 mt-3">
    <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Rights:</small><br>
  <small><?php echo $req['rights'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Account state:</small><br>
<small><?php echo $req['account_status'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crimes Reported:</small><br>
<small><?php echo $req['reports'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-danger">False Reports:</small><br>
<small><?php echo $req['false_reports'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Date Joined:</small><br>
<small><?php echo $req['date'];?></small></div>
      </div>
    </div>
  </div>
    </div>
<!-- General Information end -->

  </div>

    <div class="modal-footer">
      <div class="form-group text-center center">
        <button class="btn pl-3 pr-3 btn-danger" id="b-admin-<?php echo $req['id'];?>"><i class="fas fa-ban"></i> Block </button>
        <button class="btn pl-3 pr-3 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
     </div>
    </div>
  </div>
</div>
</div>
<!-- view user modal end -->

<!-- Edituser modal -->
<div class="modal fade" id="edit_admin_<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">

   <div class="modal-content" style="font-size: 1.5em;">

     <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12 mb-3">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-user fa-stack-1x fa-inverse"></i>
</span> <h5 class="d-inline">User Information</h5>
</div>
<div class="col-sm-12 col-md-12 card  bg-light">
<div class="card-body" style="margin: -5px!important;">
<div class="row" style="font-size:20px !important;">
 <div class="col-sm-6 col-md-6 mt-3">
<div class="text-sm text-primary ml-3 text-capitalize mb-2"><small class="text-success">Full Name:</small>
<br>
<small><?php echo $req['name'];?></small></div>
<div class="ml-3">
<div class="text-sm text-primary mb-2"><small class="text-success">Email Address:</small><br>
<small><?php echo $req['email'];?></small></div>

         <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success mb-1">Rights:</small><br>
           <form id="edit_user-<?php echo $req['id'];?>">
             <input type="hidden" name="id" value="<?php echo $req['id'];?>">
           <select name="rights" class="form-control">
             <option value="user" <?php if($req['rights']=='user') {echo 'selected';};?>>User</option>
             <option value="administrator" <?php if($req['rights']=='administrator') {echo 'selected';};?>>Administrator</option>
           </select></form></div>
     </div></div>

       <div class="col-sm-5 col-md-5 ml-4 mt-3">
     <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Mobile Number:</small><br>
   <small><?php echo $req['phone'];?></small></div>

   <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Account state:</small><br>
 <small><?php echo $req['account_status'];?></small></div>

   <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success ">Date Joined:</small><br>
 <small><?php echo $req['date'];?></small></div>
       </div>
     </div>
   </div>
     </div>
<!-- General Information end -->

   </div>
     <div class="modal-footer">
       <div class="form-group text-center center">
         <button type="button" class="btn pl-5 pr-5 mr-3 btn-primary" id="save-admin-edit-<?php echo $req['id'];?>"><i class="far fa-edit"></i> Save Edit <i class="fas fa-cog fa-spin" id="loadinguser-<?php echo $req["id"];?>"></i>&nbsp;</a>
         <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
      </div>
     </div>
   </div>
 </div>
</div>
<!-- Edituser modal end -->
<!-- delete contract -->
</tr>
<form id="b_admin-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="account_status" value="blocked">
</form>
<script>
$(document).ready(function() {

$('#loadingadmin-<?php echo $req["id"];?>').hide();
$("#del-admin-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."home/delete_item";?>',
      type: "POST",
      data: $('#del_admin-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data=='true') {
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  alert(data);
}
}
});
  } {
    return false;
  }
});

$("#b-admin-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to Block this user?")){
    $.ajax({
      url:'<?php echo base_url()."home/update_user";?>',
      type: "POST",
      data: $('#b_admin-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data=='saved') {
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  alert(data);
}
}
});
  } {
    return false;
  }
});

//Save Issue edit
$("#save-admin-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingadmin-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."home/update_user";?>',
  type: "POST",
  data: $("#edit_admin-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingadmin-<?php echo $req['id'];?>").hide();
  if(data=="saved") {
alert('User data has been updated successfully!!');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
alert(data);
  }
  }
});
});
});
</script>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
</div>
<!-- Admin Tab ENd -->

<!-- Blocked Users Tab Start -->

<div class="tab-pane fade" id="blocked" role="tabpanel" aria-labelledby="admin-tab">
  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Reports</th>
  <th>False Reports</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($users==false): ?>
<tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($blocked as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewb-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['name']; ?></a></td>
<td><?php echo $req['email']; ?></td>
<td><?php echo $req['phone']; ?></td>
<td><?php echo$req['reports'];?></td>
<td><?php echo$req['false_reports'];?></td>
<td class="actions">
<a id="del-b-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="far fa-trash-alt"></i></a></b>
<form id="del_b-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="type" value="users">
</form>
</td>

<!-- view user modal -->
<div class="modal fade" id="viewb-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">

  <div class="modal-content" style="font-size: 1.5em;">

    <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12 mb-3">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-user fa-stack-1x fa-inverse"></i>
</span> <h5 class="d-inline">User Information</h5>
</div>
<div class="col-sm-12 col-md-12 card  bg-light">
<div class="card-body" style="margin: -5px!important;">
<div class="row" style="font-size:20px !important;">
<div class="col-sm-6 col-md-6 mt-3">
<div class="text-sm text-primary ml-3 text-capitalize mb-2"><small class="text-success">Full Name:</small>
<br>
<small><?php echo $req['name'];?></small></div>
        <div class="ml-3">
        <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Mobile Number:</small><br>
      <small><?php echo $req['phone'];?></small></div>

    <div class="text-sm text-primary mb-2"><small class="text-success">Email Address:</small><br>
  <small><?php echo $req['email'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crime Reviews:</small><br>
<small><?php echo $req['reviews'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Last login:</small><br>
<small><?php echo $req['last_login'];?></small></div>


    </div></div>

      <div class="col-sm-5 col-md-5 ml-4 mt-3">
    <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Rights:</small><br>
  <small><?php echo $req['rights'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Account state:</small><br>
<small><?php echo $req['account_status'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Crimes Reported:</small><br>
<small><?php echo $req['reports'];?></small></div>

<div class="text-sm text-primary text-capitalize mb-2"><small class="text-danger">False Reports:</small><br>
<small><?php echo $req['false_reports'];?></small></div>

  <div class="text-sm text-primary text-capitalize mb-2"><small class="text-success">Date Joined:</small><br>
<small><?php echo $req['date'];?></small></div>
      </div>
    </div>
  </div>
    </div>
<!-- General Information end -->

  </div>

    <div class="modal-footer">
      <div class="form-group text-center center">
        <button class="btn pl-3 pr-3 btn-success" id="unblock-<?php echo $req['id'];?>"><i class="fas fa-ban"></i> Unblock </button>
        <button class="btn pl-3 pr-3 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
     </div>
    </div>
  </div>
</div>
</div>
<!-- view user modal end -->
<!-- -->
</tr>
<form id="unblock_-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="account_status" value="active">
</form>
<script>
$(document).ready(function() {

$('#loadinguser-<?php echo $req["id"];?>').hide();
$("#del-b-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."home/delete_item";?>',
      type: "POST",
      data: $('#del_b-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data=='true') {
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  alert(data);
}
}
});
  } {
    return false;
  }
});

$("#unblock-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to unblock this user?")){
    $.ajax({
      url:'<?php echo base_url()."home/update_user";?>',
      type: "POST",
      data: $('#unblock_-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data=='saved') {
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  alert(data);
}
}
});
  } {
    return false;
  }
});
//Save Issue edit
$("#save-user-edit-<?php echo $req['id'];?>").click(function() {
$("#loadinguser-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."home/update_user";?>',
  type: "POST",
  data: $("#edit_user-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadinguser-<?php echo $req['id'];?>").hide();
  if(data=="saved") {
alert('User data has been updated successfully!!');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
alert(data);
  }
  }
});
});
});
</script>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
</div>
<!-- Blocked Users Tab ENd -->
</div>
</div>
</div>
<div id="map" style="display:none;"></div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj5lKUoRNwRa0maEalb4F-ATTiNzSwK1g&libraries=places&callback=initMap">
</script>
