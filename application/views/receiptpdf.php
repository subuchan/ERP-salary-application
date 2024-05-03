<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css'); ?>">
    <title></title>
</head>

<h2>Employee Salary Slip</h2>

<table>
  <tr>
    <th>Emp Id</th>
    <th>Emp Name</th>
    <th>Gross</th>
    <th>Basic</th>
    <th>Hra</th>
    <th>allowance</th>
    <th>Total Salary</th>
    <th>Total Days</th>
    <th>Pay Days</th>
    <th>pay amount</th>
  </tr>
  <?php 
  if(isset($data)){
    foreach ($data as $row){
  ?>
  <tr>
    <td><?=$row->emp_id?></td>
    <td><?=$row->emp_name?></td>
    <td><?=$row->gross?></td>
    <td><?=$row->basic?></td>
    <td><?=$row->hra?></td>
    <td><?=$row->allowance?></td>
    <td><?=$row->basic+$row->hra+$row->allowance?></td>
    <td>30</td>
    <td><?=$row->daypresent?></td>
    <td><?=$row->total/30*$row->daypresent?></td>
  </tr>
  <?php
  }
}
  ?>
</table>


</body>
</html>

