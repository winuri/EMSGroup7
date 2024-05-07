<?php
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $employee_id = $_POST["employee"];
    $leave_type = $_POST["leave_type"];
    $from_date = $_POST["from_date"];
    $to_date = $_POST["to_date"];
    $leave_duration = $_POST["leave_duration"];
    $notes = $_POST["notes"];


    // Get the Position_id from the employee table
    $sql_position = "SELECT Position_id FROM employee WHERE EMP_ID = '$employee_id'";
    $result_position = $conn->query($sql_position);
    if ($result_position->num_rows > 0) {
        $row = $result_position->fetch_assoc();
        $position_id = $row['Position_id'];

        // Insert data into the emp_leaves table
        $sql = "INSERT INTO emp_leaves (EMP_ID, Position_id, leave_type, from_date, to_date, leave_duration, notes)
                VALUES ('$employee_id', '$position_id', '$leave_type', '$from_date', '$to_date', '$leave_duration', '$notes')";

        if ($conn->query($sql) === TRUE) {
            // Display a browser alert and redirect to the leave form page
            echo '<script>alert("Leave request submitted successfully.");</script>';
            echo '<script>window.location.href = "leave-form.php";</script>';
            exit(); // Stop executing the rest of the code after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Employee not found";
    }
}
?>
