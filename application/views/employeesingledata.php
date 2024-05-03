<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css'); ?>">
    <title>View Data</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:ntd-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="main-app">
        <div class="container">
            <div class="table_pdf">
            <h2 class="emp-heading">Employee Data</h2>
            <?php
            if (isset($newsalary)) {
                ?>
                <div class="table1">
                    <table>
                        <tr>
                            <th>Employee Id :</th>
                            <td>
                                <?= $newsalary['new_id'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Employee Name :</th>
                            <td>
                                <?= $newsalary['new_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Days :</th>
                            <td>
                                <?= $newsalary['total_days'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Present Days :</th>
                            <td>
                                <?= $newsalary['new_daypresent'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Fixed Gross Salary :</th>
                            <td>
                                <?= $newsalary['fixed_gross'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Fixed basic Salary :</th>
                            <td>
                                <?= $newsalary['fixed_basic'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Fixed hra :</th>
                            <td>
                                <?= $newsalary['fixed_hra'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Fixed Allowance :</th>
                            <td>
                                <?= $newsalary['fixed_allowance'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>New Gross Salary :</th>
                            <td>
                                <?= $newsalary['new_gross'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>New Basics Salary :</th>
                            <td>
                                <?= $newsalary['new_basic'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>New HRA :</th>
                            <td>
                                <?= $newsalary['new_hra'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>New Allowance :</th>
                            <td>
                                <?= $newsalary['new_allowance'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Paid Amount</th>
                            <td>
                                <?= $newsalary['new_total'] ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>