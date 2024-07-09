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
                <tr><th>Employee Name</th><th>Month_year</th><th>Total working Days</th><th>Total Deduction</th><th>Other earnings</th><th>Tax amount</th><th>Net_salary</th><th>Craeted at</th></tr>
                
            
          
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pay'; // corrected spelling of 'payroll'

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payroll"; // corrected missing quote

$result = $conn->query($sql);

if ($result) { // Check if the query was successful
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $emp_id= $row["EMP_ID"]; // corrected variable name
            $month_year= $row["month_year"];
            $total_working_days=$row["total_working_days"];
            $total_deductions = $row["total_deductions"];
            $other_earning = $row["other_earnings"]; // corrected variable name
            $tax_amount = $row["tax_amount"];
            $net_salary = $row["net_salary"];
            $created_at = $row["created_at"];

            echo'<tr><td>'.$id.'</td><td>'.$month_year.'</td><td>'.$total_working_days.'</td><td>'.$total_deductions.'</td><td>'.$other_earning.'</td><td>'.$tax_amount.'</td><td>'.$net_salary.'</td><td>'.$created_at.'</td></tr>';
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close(); // Close the database connection
?>
</table>

        </div>
    </div>

</body>

</html>