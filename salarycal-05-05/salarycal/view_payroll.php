<?php
// Include the database connection file
include 'db_connection.php';

// Retrieve the payroll ID from the URL parameters
$payroll_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($payroll_id <= 0) {
    die("Invalid payroll ID.");
}

// SQL query to fetch payroll details
$sql = "
    SELECT 
        payroll.id AS Payroll_ID,
        employee.EMP_ID AS Employee_ID,
        CONCAT(employee.F_name, ' ', employee.L_name) AS Employee,
        positions.Position_name AS Position,
        bankdetails.Bank_Name AS Bank_Name,
        accountdetails.Acc_No AS Bank_No,
        workplace.Work_name AS Work_Place,
        paymethod.Pay_method AS Payment_Method,
        payroll.total_working_days AS Total_Working_Days,
        payroll.total_deduction AS Total_Deductions,
        payroll.other_earnings AS Other_Earnings,
        payroll.tax_amount AS Tax_Amount,
        payroll.net_salary AS Net_Salary,
        payroll.created_at AS Created_At
    FROM 
        payroll
    LEFT JOIN employee ON payroll.EMP_ID = employee.EMP_ID
    LEFT JOIN positions ON employee.Position_ID = positions.Position_ID
    LEFT JOIN bankdetails ON employee.Bank_ID = bankdetails.Bank_ID
    LEFT JOIN accountdetails ON employee.EMP_ID = accountdetails.EMP_ID
    LEFT JOIN workplace ON employee.work_ID = workplace.work_ID
    LEFT JOIN paymethod ON employee.Pay_ID = paymethod.Pay_ID
    WHERE 
        payroll.id = ?
";

// Prepare and execute the query
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $payroll_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Payroll Details</title>
        <style>
            table {
                width: 50%;
                border-collapse: collapse;
                margin: 50px 0;
                font-size: 18px;
                text-align: left;
            }
            th, td {
                padding: 12px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>Payroll Details</h1>
        <table>
            <tr><th>Payroll ID</th><td><?php echo htmlspecialchars($row['Payroll_ID']); ?></td></tr>
            <tr><th>Employee ID</th><td><?php echo htmlspecialchars($row['Employee_ID']); ?></td></tr>
            <tr><th>Employee</th><td><?php echo htmlspecialchars($row['Employee']); ?></td></tr>
            <tr><th>Position</th><td><?php echo htmlspecialchars($row['Position']); ?></td></tr>
            <tr><th>Bank Name</th><td><?php echo htmlspecialchars($row['Bank_Name']); ?></td></tr>
            <tr><th>Bank No</th><td><?php echo htmlspecialchars($row['Bank_No']); ?></td></tr>
            <tr><th>Work Place</th><td><?php echo htmlspecialchars($row['Work_Place']); ?></td></tr>
            <tr><th>Payment Method</th><td><?php echo htmlspecialchars($row['Payment_Method']); ?></td></tr>
            <tr><th>Total Working Days</th><td><?php echo htmlspecialchars($row['Total_Working_Days']); ?></td></tr>
            <tr><th>Total Deductions</th><td><?php echo htmlspecialchars($row['Total_Deductions']); ?></td></tr>
            <tr><th>Other Earnings</th><td><?php echo htmlspecialchars($row['Other_Earnings']); ?></td></tr>
            <tr><th>Tax Amount</th><td><?php echo htmlspecialchars($row['Tax_Amount']); ?></td></tr>
            <tr><th>Net Salary</th><td><?php echo htmlspecialchars($row['Net_Salary']); ?></td></tr>
            <tr><th>Created At</th><td><?php echo htmlspecialchars($row['Created_At']); ?></td></tr>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "No payroll details found for the specified ID.";
}

// Close the database connection
$conn->close();
?>
