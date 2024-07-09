<?php
include 'db_connection.php';

$message = "";

// Delete record if delete_id is set
if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    
    // Prepare the DELETE statement
    $sql = "DELETE FROM payroll WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);
    
    // Execute the DELETE statement
    if ($stmt->execute()) {
        $message = "Payroll record deleted successfully";
    } else {
        $message = "Error: " . $stmt->error;
    }
}

// Fetch employee IDs for the select dropdown
$employee_ids = [];
$emp_sql = "SELECT DISTINCT EMP_ID FROM payroll";
$emp_result = $conn->query($emp_sql);
if ($emp_result->num_rows > 0) {
    while($emp_row = $emp_result->fetch_assoc()) {
        $employee_ids[] = $emp_row['EMP_ID'];
    }
}

// Fetch payroll records based on filter
$filter_emp_id = isset($_GET['filter_emp_id']) ? $_GET['filter_emp_id'] : '';
$payroll_sql = "SELECT * FROM payroll";
if ($filter_emp_id) {
    $payroll_sql .= " WHERE EMP_ID = ?";
    $stmt = $conn->prepare($payroll_sql);
    $stmt->bind_param("i", $filter_emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($payroll_sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate Payroll</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function filterByAll() {
            window.location.href = 'payroll_record.php';
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td a {
            color: #007BFF;
            text-decoration: none;
            margin-right: 5px;
        }
        td a:hover {
            text-decoration: underline;
        }
        td:last-child {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"], button[type="button"] {
            background-color: #007BFF;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            width: 100%;
        }
        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <!-- Sidebar iframe -->
            <iframe id="sidebar-iframe" src="sidebar.html" width="100%" height="100%" style="border: none;" title="Sidebar"></iframe>
        </div>
        <div class="content">
            <h1>Payroll Records</h1>
            <div>
                <form method="GET" action="">
                <table>
                    <tr>
                    <td><select name="filter_emp_id">
                        <option value="">Select Employee ID</option>
                        <?php foreach($employee_ids as $emp_id): ?>
                            <option value="<?php echo $emp_id; ?>" <?php echo ($emp_id == $filter_emp_id) ? 'selected' : ''; ?>>
                                <?php echo $emp_id; ?>
                            </option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><button type="submit">Filter</button></td>
                    <td><button type="button" onclick="filterByAll()">All</button></td>
                    </tr>
                </table>
                </form>
            </div>
            <br/>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Total Working Days</th>
                    <th>Total Deductions</th>
                    <th>Other Earnings</th>
                    <th>Tax Amount</th>
                    <th>Net Salary</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['EMP_ID']}</td>
                                <td>{$row['total_working_days']}</td>
                                <td>{$row['total_deduction']}</td>
                                <td>{$row['other_earnings']}</td>
                                <td>{$row['tax_amount']}</td>
                                <td>{$row['net_salary']}</td>
                                <td>{$row['created_at']}</td>
                                <td>
                                    <a href='view_payroll.php?id={$row['id']}'>View</a> | 
                                    <a href='payroll_record.php?delete_id={$row['id']}'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No payroll records found</td></tr>";
                }
                $conn->close();
                ?>
            </table>
            <p><?php echo $message; ?></p>
        </div>
    </div>
</body>
</html>
