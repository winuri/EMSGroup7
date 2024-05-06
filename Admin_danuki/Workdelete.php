<?php
/*
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
*/


include('ConnectionModel.php');

// Function to delete a row from the workplace table
function deleteWorkplace($work_ID, $conn) {
    echo "<script>";
    echo "var confirmDelete = confirm('Are you sure you want to delete this record?');";
    echo "if (confirmDelete) {";
    // Update the work_ID column in the employee table to null for employees assigned to the workplace being deleted
    $update_employee_sql = "UPDATE employee SET work_ID = NULL WHERE work_ID = $work_ID";
    if ($conn->query($update_employee_sql) === TRUE) {
        echo "alert('Employee records updated successfully');";
    } else {
        echo "alert('Error updating employee records: " . $conn->error . "');";
    }

    // Delete the row from the workplace table
    $delete_workplace_sql = "DELETE FROM workplace WHERE work_ID = $work_ID";
    if ($conn->query($delete_workplace_sql) === TRUE) {
        echo "alert('Workplace deleted successfully');";
        echo "window.location.href = 'work_view.php';";
    } else {
        echo "alert('Error deleting workplace: " . $conn->error . "');";
    }
    echo "} else {";
    echo "alert('Deletion cancelled');";
    echo "}";
    echo "</script>";
}

// Example usage: delete a workplace and update relevant employee records
$work_ID_to_delete = 1; // Replace with the actual ID of the workplace you want to delete
deleteWorkplace($work_ID_to_delete, $conn);




?>