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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $toolId = $_POST['toolId'];
    $toolName = $_POST['toolName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['Price'];
    $purchaseDate = $_POST['purchaseDate'];

    // Update query
    $sql = "UPDATE inventory SET Tool_name='$toolName', Quantity=$quantity, Price=$price, purchase_date='$purchaseDate' WHERE Tool_ID='$toolId'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to tool list after successful update
        header("Location:view.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
