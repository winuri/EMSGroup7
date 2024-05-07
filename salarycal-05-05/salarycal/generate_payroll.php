<?php
    // Database connection
// Include database connection file
    include 'db_connection.php';

    // Function to calculate total working days considering leaves
    function calculateTotalWorkingDays($employeeId, $fromDate, $toDate, $conn)
    {
        $totalWorkingDays = 0;

        $sql = "SELECT COUNT(*) AS total FROM attendance WHERE EMP_ID = $employeeId AND attendance_date BETWEEN '$fromDate' AND '$toDate'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalWorkingDays = $row['total'];

        $sql = "SELECT COUNT(*) AS total FROM emp_leave WHERE EMP_ID = $employeeId AND leave_date BETWEEN '$fromDate' AND '$toDate'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalLeaves = $row['total'];

        $totalWorkingDays -= $totalLeaves; // Deduct leaves from total working days
    
        return $totalWorkingDays;
    }

    // Function to calculate total deductions
    function calculateTotalDeductions($employeeId, $fromDate, $toDate, $conn)
    {
        $totalDeductions = 0;

        $sql = "SELECT SUM(CASE WHEN leave_type = 'Full Day' THEN salary / 30
                WHEN leave_type = 'Half Day' THEN salary / 60 END) AS deductions
            FROM emp_leave
            INNER JOIN employee ON emp_leave.EMP_ID = employee.id
            WHERE EMP_ID = $employeeId AND leave_date BETWEEN '$fromDate' AND '$toDate'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalDeductions = $row['deductions'];

        return $totalDeductions;
    }

    // Function to calculate net salary
    function calculateNetSalary($salary, $totalWorkingDays, $totalDeductions)
    {
        $netSalary = $salary - $totalDeductions;
        return $netSalary;
    }

    // Main function to generate payroll
    function generatePayroll($employeeId, $fromDate, $toDate, $conn)
    {
        $sql = "SELECT salary FROM employee WHERE id = $employeeId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $salary = $row['salary'];

        $totalWorkingDays = calculateTotalWorkingDays($employeeId, $fromDate, $toDate, $conn);
        $totalDeductions = calculateTotalDeductions($employeeId, $fromDate, $toDate, $conn);
        $netSalary = calculateNetSalary($salary, $totalWorkingDays, $totalDeductions);

        // Insert payroll record
        $sql = "INSERT INTO payroll (EMP_ID, month_year, total_working_days, total_deductions, net_salary)
            VALUES ($employeeId, '$toDate', $totalWorkingDays, $totalDeductions, $netSalary)";
        if ($conn->query($sql) === TRUE) {
            echo "Payroll generated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Example usage
    $employeeId = 1;
    $fromDate = '2024-04-01';
    $toDate = '2024-04-30';

    generatePayroll($employeeId, $fromDate, $toDate, $conn);

    $conn->close();
    ?>