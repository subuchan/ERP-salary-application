<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>View Data</title>
    <style>
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
     border: 1px solid #dddddd;
     text-align: left;
     padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
</head>
<body>
  <div class="main-app">
    <div class="container">
     <div class="table_data">
     <h2>Employee Data</h2>

<table>
  <tr>
    <th>Emp Id</th>
    <th>Emp Name</th>
    <th>Pay Days</th>
    <th>Gross</th>
    <th>Basic</th>
    <th>Hra</th>
    <th>allowance</th>
    <th>pay amount</th>
    <th>Download pdf</th>
  </tr>
  <?php 
  if(isset($data5)){
    foreach ($data5 as $row){
  ?>
  <tr>
    <td><?=$row->emp_id?></td>
    <td><?=$row->emp_name?></td>
    <td><?=$row->daypresent?></td>
    <td><?=$row->gross?></td>
    <td><?=$row->basic?></td>
    <td><?=$row->hra?></td>
    <td><?=$row->allowance?></td>
    <td><?=$row->total/30*$row->daypresent?></td>
    <td><a href="<?=base_url('maincont/emppdfid/').$row->emp_id?>">Download pdf</a></td>
  </tr>
  <?php
  }
}
  ?>
</table>
<div class="logout"><a href="<?= base_url('maincont/dashboard') ?>">Go To Dashboard</a></div>
     </div>
    </div>
  </div>


</body>
</html>

