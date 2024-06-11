<?php
// Database connection setup
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

// Fetch Tool ID based on the provided Tool Name
if (isset($_GET['toolName'])) {
    $toolName = $_GET['toolName'];
    $sql = "SELECT Tool_ID FROM inventory WHERE Tool_name = '$toolName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["Tool_ID"];
    } else {
        echo "Tool ID not found";
    }
}

$conn->close();
?>
