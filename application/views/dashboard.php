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
    <title>Dashboard</title>
</head>

<body>

    <div class="main-app">
        <div class="container" id="dashboardpage">
            <div class="col-lg-6">
              <div class="options">
                <div class="logout"><a href="<?= base_url('maincont/employee_data') ?>">Employee View Data</a></div>
                <div class="logout"><a href="<?= base_url('maincont/new_empform') ?>">Add New Employee</a></div>
                <div class="logout"><a href="<?= base_url('maincont/empsalary_update') ?>">Employee Salary</a></div>
                <div class="logout"><a href="<?= base_url('maincont/attendance_page') ?>">Employee Attendance</a></div>
                <div class="logout"><a href="<?= base_url('maincont/excel_import') ?>">Download Excel</a></div>
                <!-- <div class="logout"><a href="<?= base_url('maincont/pdfget') ?>">Download PDF</a></div> -->
                <div class="logout"><a href="<?= base_url('maincont/logout') ?>">Logout</a></div>
              </div>
            </div>
            <div class="col-lg-6">
               <div class="welcome">
                 <h2>Dashboard</h2>
               </div>
            </div>
        </div>
    </div>
</body>

</html>