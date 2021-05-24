
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{title}</title>
  <link href="<?php echo base_url();?>template/assets/css/main.css" rel="stylesheet" />

  <style>
body {
  background: #fff !important;
}
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
  }

  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .table tbody + tbody {
    border-top: 2px solid #dee2e6;
  }

  .table .table {
    background-color: #fff;
  }

  .table-sm th,
  .table-sm td {
    padding: 0.3rem;
  }

  .table-bordered {
    border: 1px solid #dee2e6;
  }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6;
  }

  .table-bordered thead th,
  .table-bordered thead td {
    border-bottom-width: 2px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-primary,
  .table-primary > th,
  .table-primary > td {
    background-color: #b8daff;
  }

  .table-hover .table-primary:hover {
    background-color: #9fcdff;
  }

  .table-hover .table-primary:hover > td,
  .table-hover .table-primary:hover > th {
    background-color: #9fcdff;
  }

  .table-secondary,
  .table-secondary > th,
  .table-secondary > td {
    background-color: #d6d8db;
  }

  .table-hover .table-secondary:hover {
    background-color: #c8cbcf;
  }

  .table-hover .table-secondary:hover > td,
  .table-hover .table-secondary:hover > th {
    background-color: #c8cbcf;
  }

  .table-success,
  .table-success > th,
  .table-success > td {
    background-color: #c3e6cb;
  }

  .table-hover .table-success:hover {
    background-color: #b1dfbb;
  }

  .table-hover .table-success:hover > td,
  .table-hover .table-success:hover > th {
    background-color: #b1dfbb;
  }

  .table-info,
  .table-info > th,
  .table-info > td {
    background-color: #bee5eb;
  }

  .table-hover .table-info:hover {
    background-color: #abdde5;
  }

  .table-hover .table-info:hover > td,
  .table-hover .table-info:hover > th {
    background-color: #abdde5;
  }

  .table-warning,
  .table-warning > th,
  .table-warning > td {
    background-color: #ffeeba;
  }

  .table-hover .table-warning:hover {
    background-color: #ffe8a1;
  }

  .table-hover .table-warning:hover > td,
  .table-hover .table-warning:hover > th {
    background-color: #ffe8a1;
  }

  .table-danger,
  .table-danger > th,
  .table-danger > td {
    background-color: #f5c6cb;
  }

  .table-hover .table-danger:hover {
    background-color: #f1b0b7;
  }

  .table-hover .table-danger:hover > td,
  .table-hover .table-danger:hover > th {
    background-color: #f1b0b7;
  }

  .table-light,
  .table-light > th,
  .table-light > td {
    background-color: #fdfdfe;
  }

  .table-hover .table-light:hover {
    background-color: #ececf6;
  }

  .table-hover .table-light:hover > td,
  .table-hover .table-light:hover > th {
    background-color: #ececf6;
  }

  .table-dark,
  .table-dark > th,
  .table-dark > td {
    background-color: #c6c8ca;
  }

  .table-hover .table-dark:hover {
    background-color: #b9bbbe;
  }

  .table-hover .table-dark:hover > td,
  .table-hover .table-dark:hover > th {
    background-color: #b9bbbe;
  }

  .table-active,
  .table-active > th,
  .table-active > td {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-hover .table-active:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-hover .table-active:hover > td,
  .table-hover .table-active:hover > th {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
  }

  .table .thead-light th {
    color: #495057;
    background-color: #e9ecef;
    border-color: #dee2e6;
  }

  .table-dark {
    color: #fff;
    background-color: #212529;
  }

  .table-dark th,
  .table-dark td,
  .table-dark thead th {
    border-color: #32383e;
  }

  .table-dark.table-bordered {
    border: 0;
  }

  .table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05);
  }

  .table-dark.table-hover tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.075);
  }
  }
  </style>
  </head>
<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
  <tr>
    <th width="5%">#</th>
    <th width="25%">Type</th>
    <th width="30%">Description</th>
    <th width="20%">Scene</th>
    <th width="10%">Date</th>
    <th width="10%">Time</th>
  </tr>
  </thead>
  <tbody width="100%">
<?php if($reports==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($reports as $req): ?>
<tr>
<td width="5%"><?php echo $i++.'.';?>
<td width="25%"><?php echo $req['type']; ?></td>
<td width="30%"><?php if(empty($req['description'])) {echo 'No description added';} else {echo $req['description']; }?></td>
  <td width="20%"><?php echo $req['location']; ?></td>
  <td width="10%"><?php echo date("d F Y", strtotime($req['date']));?></td>
<td width="10%"><?php echo date("h:g:s A", strtotime($req['time']));?></td>

<!-- delete contract -->
</tr>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
</body>
