<?php
// Include the database connection file
include 'db_connection.php';

// Function to calculate total working days considering leaves
function calculateTotalWorkingDays($employeeId, $fromDate, $toDate, $conn)
{
    $totalWorkingDays = 0;

    $sql = "SELECT COUNT(*) AS total FROM attendance WHERE EMP_ID = $employeeId AND Date BETWEEN '$fromDate' AND '$toDate'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalWorkingDays = $row['total'];

    $sql = "SELECT COUNT(*) AS total FROM emp_leaves WHERE EMP_ID = $employeeId AND submission_date BETWEEN '$fromDate' AND '$toDate'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalLeaves = $row['total'];

    $totalWorkingDays -= $totalLeaves; // Deduct leaves from total working days

    if ($totalLeaves > $totalWorkingDays) {
        $totalWorkingDays = 0;
    }

    return $totalWorkingDays;
}

// Function to calculate total deductions
function calculateTotalDeductions($employeeId, $fromDate, $toDate, $deductions, $conn)
{
    $totalDeductions = 0;

    $sql = "SELECT SUM(CASE WHEN leave_type = 'Full Day' THEN salary / 30
                WHEN leave_type = 'Half Day' THEN salary / 60 END) AS deductions
            FROM emp_leaves
            INNER JOIN positions ON emp_leaves.Position_id = positions.Position_id
            WHERE EMP_ID = $employeeId AND submission_date BETWEEN '$fromDate' AND '$toDate'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalDeductions = $row['deductions'];

    $totalDeductions += $deductions;

    return $totalDeductions;
}

// Function to calculate net salary
function calculateNetSalary($positionSalary, $totalWorkingDays, $totalDeductions, $otherEarnings, $taxAmount)
{
    $netSalary = ($positionSalary * $totalWorkingDays) - $totalDeductions + $otherEarnings - $taxAmount;
    return $netSalary;
}

// Main function to generate payroll
function generatePayroll($employeeId, $fromDate, $toDate, $otherEarnings, $deductions, $taxAmount, $conn)
{
    // Get employee's position and salary
    $sql = "SELECT Position_id FROM employee WHERE EMP_ID = $employeeId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $positionId = $row['Position_id'];

    // Get position-specific salary
    $sql = "SELECT salary FROM positions WHERE Position_id = $positionId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $positionSalary = $row['salary'];

    $totalWorkingDays = calculateTotalWorkingDays($employeeId, $fromDate, $toDate, $conn);
    $totalDeductions = calculateTotalDeductions($employeeId, $fromDate, $toDate, $deductions, $conn);
    $netSalary = calculateNetSalary($positionSalary, $totalWorkingDays, $totalDeductions, $otherEarnings, $taxAmount);

    // Insert payroll record
    $sql = "INSERT INTO payroll (EMP_ID, month_year, total_working_days, total_deductions, other_earnings, tax_amount, net_salary)
            VALUES ($employeeId, '$toDate', $totalWorkingDays, $totalDeductions, $otherEarnings, $taxAmount, $netSalary)";
    if ($conn->query($sql) === TRUE) {
        // Redirect to payroll report page
        $employeeName = getEmployeeName($employeeId, $conn);
        header("Location: payroll_report.php?employee_name=$employeeName&from_date=$fromDate&to_date=$toDate&total_working_days=$totalWorkingDays&total_deductions=$totalDeductions&other_earnings=$otherEarnings&tax_amount=$taxAmount&net_salary=$netSalary");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to get employee name
function getEmployeeName($employeeId, $conn)
{
    $sql = "SELECT F_name FROM employee WHERE EMP_ID = $employeeId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['F_name'];
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['employee_id'];
    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];
    $otherEarnings = $_POST['other_earnings'];
    $deductions = $_POST['deductions'];
    $taxAmount = $_POST['tax_amount'];

    generatePayroll($employeeId, $fromDate, $toDate, $otherEarnings, $deductions, $taxAmount, $conn);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Payroll</title>
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
            <h1>Generate Payroll</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="employee_id">Employee:</label>
                <select name="employee_id" id="employee_id">
                    <option value="" selected disabled>Select...</option>
                    <?php include 'db_connection.php'; ?>
                    <?php
                    // Fetch employee names and positions from the database
                    $sql = "SELECT employee.EMP_ID, employee.F_name,employee.L_name, positions.Position_name FROM employee INNER JOIN positions 
        ON employee.Position_ID = positions.Position_id
        ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['EMP_ID'] . "'>" . $row['F_name'] . " " . $row['L_name'] . " (" . $row['Position_name'] . ")</option>";
                        }
                    } else {
                        echo "<option value=''>No employee found</option>";
                    }
                    ?>
                </select>
                <br><br>
                <label for="from_date">From Date:</label>
                <input type="date" name="from_date" id="from_date" required>
                <br><br>
                <label for="to_date">To Date:</label>
                <input type="date" name="to_date" id="to_date" required>
                <br><br>
                <label for="other_earnings">Other Earnings:</label>
                <input type="number" name="other_earnings" id="other_earnings" value="0">
                <br><br>
                <label for="deductions">Deductions:</label>
                <input type="number" name="deductions" id="deductions" value="0">
                <br><br>
                <label for="tax_amount">Tax Amount:</label>
                <input type="number" name="tax_amount" id="tax_amount" value="0">
                <br><br>
                <input type="submit" value="Generate Payroll">
            </form>
        </div>
    </div>

</body>

</html>