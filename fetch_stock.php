<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "emsdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tool_id = isset($_GET['tool_id']) ? $_GET['tool_id'] : '';

$sql = "SELECT Tool_ID, Tool_Name, Quantity,Price, Purchase_Date FROM inventory WHERE Tool_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tool_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode([
        'tool_name' => $data['Tool_Name'],
        'current_quantity' => $data['Quantity'],
        'purchase_date' => $data['Purchase_Date']
    ]);
} else {
    echo json_encode([]);
}
$conn->close();
?>
