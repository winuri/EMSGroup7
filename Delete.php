<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Tool</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color:#15038e;
            color: #fff;
            height: 100vh;
            width: 150px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .section-bar {
            background-color: #004085; /* Dark blue */
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            margin-left: 170px;
            margin-top: 100px;
            text-align: center; /* Center the form horizontally */
        }

        h2 {
            text-align: center; /* Center the heading */
            margin-top: 40px; /* Increase the gap between the heading and the top bar */
        }

        form {
            text-align: left; /* Align form content to the left */
        }

        label {
            display: block;
            width: 150px; /* Set fixed width for labels */
            margin-bottom: 5px; /* Add space between label and input */
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 200px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #dc3545; /* Red color */
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333; /* Darker red color */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
           <!-- <li>Dashboard</li>
            <li>Reports</li>
            <li>Settings</li>-->
        </ul>
    </div>

    <div class="sidebar" style="top: 0; left: 150px; width: calc(100% - 150px); height: 70px; padding-top: 10px;">
       <!-- <h1>Company Name</h1>-->
    </div>

    <div class="container">
        <h2>Delete Tool</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="tool_id">Tool ID:</label>
            <input type="text" id="tool_id" name="tool_id" required><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br>
            <button type="submit">Delete Tool</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root"; // Update with your database username
        $password = "1234"; // Update with your database password
        $dbname = "EmployeeDatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get tool ID and quantity from form
        $tool_id = $_POST['tool_id'];
        $quantity = $_POST['quantity'];

        // Delete tool from database
        $sql = "DELETE FROM tools WHERE Tool_ID = '$tool_id' AND Quantity = '$quantity'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Tool with ID $tool_id and quantity $quantity deleted successfully!</p>";
        } else {
            echo "<p>Error deleting tool: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

</body>
</html>
