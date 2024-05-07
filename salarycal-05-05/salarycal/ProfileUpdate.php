<?php
include 'db_connection.php'; // Include the database connection file

// Check if employee ID is provided via GET request
/* if (isset($_GET['10'])) {
    $employee_id = $_GET['10'];

    // Fetch employee data based on employee ID
    $sql = "SELECT * FROM employee WHERE EMP_ID = 10";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $f_name = $row['F_name'];
        $l_name = $row['L_name'];
        $nic = $row['NIC'];
        $mobile = $row['Mobile'];
        $gender = $row['Gender'];
        $address = $row['Address'];
        $dob = $row['DOB'];
    } else {
        echo "Employee not found.";
        exit; // Exit if employee not found
    }
} else {
    echo "Employee ID not provided.";
    exit; // Exit if employee ID not provided
} */

// Fetch employee data based on employee ID
$sql = "SELECT * FROM employee WHERE EMP_ID = 10";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $f_name = $row['F_name'];
    $l_name = $row['L_name'];
    $nic = $row['NIC'];
    $mobile = $row['Mobile'];
    $gender = $row['Gender'];
    $address = $row['Address'];
    $dob = $row['DOB'];
} else {
    echo "Employee not found.";
    exit; // Exit if employee not found
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect updated form data
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $nic = $_POST['nic'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

    // Update employee record in the database
    $sql = "UPDATE employee SET F_name = '$f_name', L_name = '$l_name', NIC = '$nic', Mobile = '$mobile', Gender = '$gender', Address = '$address', DOB = '$dob' WHERE EMP_ID = 10";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the employee list page upon successful update
        echo "<script>alert('Employee data updated successfully.'); window.location.href = 'ProfileUpdate.php';</script>";
    } else {
        echo "Error updating employee data: " . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Data</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <section class="navibar">
        <h2>Himali Janitorial and Security Service</h2>
    </section>
    <div class="container">
        <?php include 'navbar.php'; ?> <!-- Include the navigation bar -->
        <div class="right-section" style="margin-left: left 20%;">
            <h2>Update Employee Data</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="f_name">First Name:</label><br>
                <input type="text" id="f_name" name="f_name" value="<?php echo $f_name; ?>"><br>
                <label for="l_name">Last Name:</label><br>
                <input type="text" id="l_name" name="l_name" value="<?php echo $l_name; ?>"><br>
                <label for="nic">NIC:</label><br>
                <input type="text" id="nic" name="nic" value="<?php echo $nic; ?>"><br>
                <label for="mobile">Mobile:</label><br>
                <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>"><br>
                <label for="gender">Gender:</label><br>
                <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>"><br>
                <label for="address">Address:</label><br>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br>
                <label for="dob">Date of Birth:</label><br>
                <input type="text" id="dob" name="dob" value="<?php echo $dob; ?>"><br><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

</body>

</html>