<?php
include('ConnectionModel.php');


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





/*
include('ConnectionModel.php');

$work_ID = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "DELETE FROM `workplace` WHERE work_ID = $work_ID";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: Workview.php?msg=Data deleted successfully");
} else {
    echo "Failed: " . mysqli_error($conn);
}
*/
?>