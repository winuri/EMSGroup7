<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "emsdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Tool_ID'])) {
        $toolId = $conn->real_escape_string($_POST['Tool_ID']);
        
        // Debugging: Print the tool ID
        error_log("Tool ID to delete: " . $toolId);
        
        // SQL query
        $sql = "DELETE FROM inventory WHERE Tool_ID = '$toolId'";
        
        // Debugging: Print the SQL query
        error_log("SQL query: " . $sql);
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Tool_ID not set";
    }
}

$conn->close();
?>
