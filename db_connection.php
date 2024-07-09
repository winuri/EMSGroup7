
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emsdatabase_new";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
=======
<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'emsdatabase_final');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

