<?php
// lowStockData.php
header('Content-Type: application/json');

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

$sql = "SELECT Tool_name, Quantity FROM inventory WHERE Quantity < 10"; // Adjust the condition as per your requirement
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array("toolName" => $row["Tool_name"], "quantity" => $row["Quantity"]);
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode($data);
?>
