<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Tool</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #15038e;
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
        input[type="date"],
        select {
            width: 200px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
          <!--  <li>Dashboard</li>-->
           <!-- <li>Reports</li>-->
           <!-- <li>Settings</li>-->
        </ul>
    </div>

    <div class="sidebar" style="top: 0; left: 150px; width: calc(100% - 150px); height: 70px; padding-top: 10px;">
       <!-- <h1>Company Name</h1>-->
    </div>

    <div class="container">
        <h2>Add New Tool</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <?php
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

                // Fetch tool names from database
                $sql = "SELECT Tool_name FROM Inventory";
                $result = $conn->query($sql);

                // Create dropdown list
                if ($result->num_rows > 0) {
                    echo '<label for="tool_name">Tool Name:</label>';
                    echo '<select id="tool_name" name="tool_name" required>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["Tool_name"] . '">' . $row["Tool_name"] . '</option>';
                    }
                    echo '</select><br>';
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
            <label for="tool_id">Tool ID:</label>
            <input type="text" id="tool_id" name="tool_id" required><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br>
            <label for="purchase_date">Purchase Date:</label>
            <input type="date" id="purchase_date" name="purchase_date" required><br>
            <button type="submit">Add Tool</button>
            <button type="button" onclick="clearForm()">Clear</button>
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

        // Get form data
        $tool_name = $_POST['tool_name'];
        $tool_id = $_POST['tool_id'];
        $quantity = $_POST['quantity'];
        $purchase_date = $_POST['purchase_date'];

        // Insert data into database
        $sql = "INSERT INTO Inventory (Tool_name, Tool_ID, Quantity, purchase_date) VALUES ('$tool_name', '$tool_id', '$quantity', '$purchase_date')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>New tool added successfully!</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <script>
        function clearForm() {
            document.getElementById("tool_name").value = "";
            document.getElementById("tool_id").value = "";
            document.getElementById("quantity").value = "";
            document.getElementById("purchase_date").value = "";
        }
    </script>
</body>
</html>
