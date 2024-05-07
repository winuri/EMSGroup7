<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <section class="navibar">
        <h2>Himali Janitorial and Security Service</h2>
    </section>
    <div class="container">
        <?php include 'navbar.php'; ?> <!-- Include the navigation bar -->
        <div class="right-section">
            <h1>Payroll Report</h1>
            <table>
                <tr>
                    <th>Employee Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Working Days</th>
                    <th>Total Deductions</th>
                    <th>Other Earnings</th>
                    <th>Tax Amount</th>
                    <th>Net Salary</th>
                </tr>
                <tr>
                    <td><?php echo $_GET['employee_name']; ?></td>
                    <td><?php echo $_GET['from_date']; ?></td>
                    <td><?php echo $_GET['to_date']; ?></td>
                    <td><?php echo $_GET['total_working_days']; ?></td>
                    <td>$<?php echo $_GET['total_deductions']; ?></td>
                    <td>$<?php echo $_GET['other_earnings']; ?></td>
                    <td>$<?php echo $_GET['tax_amount']; ?></td>
                    <td>$<?php echo $_GET['net_salary']; ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>