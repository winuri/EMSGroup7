<?php
include('ConnectionModel.php');


// Function to delete a row from the workplace table
function deleteWorkplace($work_ID, $conn) {
    // Update the work_ID column in the employee table to null for employees assigned to the workplace being deleted
    $update_employee_sql = "UPDATE employee SET work_ID = NULL WHERE work_ID = $work_ID";
    if ($conn->query($update_employee_sql) === TRUE) {
        echo "Employee records updated successfully<br>";
    } else {
        echo "Error updating employee records: " . $conn->error . "<br>";
    }

    // Delete the row from the workplace table
    $delete_workplace_sql = "DELETE FROM workplace WHERE work_ID = $work_ID";
    if ($conn->query($delete_workplace_sql) === TRUE) {
        echo "Workplace deleted successfully<br>";
    } else {
        echo "Error deleting workplace: " . $conn->error . "<br>";
    }
}

// Example usage: delete a workplace and update relevant employee records
$workplace_id_to_delete = 1; // Replace with the actual ID of the workplace you want to delete
deleteWorkplace($workplace_id_to_delete, $conn);



/*
$work_ID = isset($_GET['id']) ? $_GET['id'] : null;

// Delete associated records in the `employee` table first
$sql_delete_employee = "DELETE FROM `employee` WHERE work_ID = $work_ID";
$result_delete_employee = mysqli_query($conn, $sql_delete_employee);

if (!$result_delete_employee) {
    echo "Failed to delete associated employee records: " . mysqli_error($conn);
    exit;
}

// Now delete the record in the `workplace` table
$sql_delete_workplace = "DELETE FROM `workplace` WHERE work_ID = $work_ID";
$result_delete_workplace = mysqli_query($conn, $sql_delete_workplace);

if ($result_delete_workplace) {
    header("Location: Workview.php?msg=Data deleted successfully");
} else {
    echo "Failed to delete workplace record: " . mysqli_error($conn);
}
*/

?>