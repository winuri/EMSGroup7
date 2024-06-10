<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $position = $_POST['position'];
    $bank_no = $_POST['bank_no'];
    $bank_name = $_POST['bank_name'];
    $work_place = $_POST['work_place'];
    $payment_method = $_POST['payment_method'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $total_deductions = $_POST['total_deductions'];
    $other_earnings = $_POST['other_earnings'];
    $tax_amount = $_POST['tax_amount'];
    $current_time = date('Y-m-d H:i:s');

    // Calculate total working days
    $from_date_obj = new DateTime($from_date);
    $to_date_obj = new DateTime($to_date);
    $interval = $from_date_obj->diff($to_date_obj);
    $total_working_days = $interval->days;

    // Get the employee position and salary using a single JOIN query
    $employee_id = $conn->real_escape_string($employee_id);
    $employee_salary_sql = "
        SELECT p.salary 
        FROM employee e
        JOIN positions p ON e.Position_ID = p.Position_ID
        WHERE e.EMP_ID = '$employee_id'";

    $employee_salary_result = $conn->query($employee_salary_sql);
    if ($employee_salary_result->num_rows > 0) {
        $employee_salary_row = $employee_salary_result->fetch_assoc();
        $salary = $employee_salary_row['salary'];
    } else {
        $salary = 0; // Default or error handling
    }


    // Calculate net salary
    $net_salary = ($total_working_days * $salary) + $other_earnings - $total_deductions - $tax_amount;

    $sql = "INSERT INTO payroll (EMP_ID, total_working_days, total_deduction, other_earnings, tax_amount, net_salary, created_at) 
            VALUES ('$employee_id', '$total_working_days', '$total_deductions', '$other_earnings', '$tax_amount', '$net_salary', '$current_time')";
    if ($conn->query($sql) === TRUE) {
        $message = "New payroll record created successfully";
        // echo $message;
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        // echo $message;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate Payroll</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin-top: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .submit-container {
        text-align: center;
        margin-top: 10px;
      }
        table {
            width: 100%;
        }
        table td {
            padding: 0px 20px 0px 20px;
            vertical-align: top;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 200px;
        }
        button[type="submit"]:hover {
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
        <form method="post" action="generate_payroll.php">
        <h1>Generate Payroll</h1>
        <table>
            <tr>
                <td>
                    <label for="employee_id">Employee:</label>
                    <select name="employee_id" id="employee_id">
                        <option value="">Select Employee</option>
                        <?php
                        $sql = "SELECT EMP_ID, F_name, L_name FROM employee";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['EMP_ID']}'>{$row['F_name']} {$row['L_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <label for="position">Position:</label>
                    <input type="text" name="position" id="position">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bank_name">Bank Name:</label>
                    <input type="text" name="bank_name" id="bank_name">
                </td>
                <td>
                    <label for="bank_no">Bank No:</label>
                    <input type="text" name="bank_no" id="bank_no">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="from_date">From Date:</label>
                    <input type="date" name="from_date" required>
                </td>
                <td>
                    <label for="to_date">To Date:</label>
                    <input type="date" name="to_date" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="total_deductions">Total Deductions:</label>
                    <input type="number" name="total_deductions" step="0.01" required>
                </td>
                <td>
                    <label for="other_earnings">Other Earnings:</label>
                    <input type="number" name="other_earnings" step="0.01" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tax_amount">Tax Amount:</label>
                    <input type="number" name="tax_amount" step="0.01" required>
                </td>
                <td>
                    <label for="work_place">Work Place:</label>
                    <input type="text" name="work_place" id="work_place">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="payment_method">Payment Method:</label>
                    <select name="payment_method" id="payment_method">
                        <option value="">Select Payment Method</option>
                        <?php
                        $sql = "SELECT Pay_ID, Pay_method FROM paymethod";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['Pay_ID']}'>{$row['Pay_method']}</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <td></td>
            </tr>
        </table>
        <div class="submit-container">
            <button type="submit">Insert</button>
        </div>
    </form>
        </div>
    </div>

    

    <script>
        $(document).ready(function() {
            $('#employee_id').change(function() {
                var employee_id = $(this).val();
                if (employee_id) {
                    $.ajax({
                        url: 'fetch_employee_details.php',
                        type: 'GET',
                        data: {employee_id: employee_id},
                        success: function(data) {
                            var details = JSON.parse(data);
                            $('#position').val(details.Position_name);
                            $('#bank_no').val(details.Acc_No);
                            $('#bank_name').val(details.Bank_Name);
                            $('#work_place').val(details.Work_name);
                            $('#payment_method').val(details.Pay_ID);
                        }
                    });
                } else {
                    $('#position').val('');
                    $('#bank_no').val('');
                    $('#bank_name').val('');
                    $('#work_place').val('');
                    $('#payment_method').val('');
                }
            });
        });
    </script>
</body>
</html>
