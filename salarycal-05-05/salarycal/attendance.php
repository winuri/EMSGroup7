<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Table</title>
    <style>
        /* Styles omitted for brevity */
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <section class="navibar">
        <h2>Himali Janitorial and Security Service</h2>
    </section>

    <div class="container">
        <?php include 'navbar.php'; ?> <!-- Include the navigation bar -->
        <div class="right-section">
            <h1>View Attendance</h1>
            <!-- Attendance filter form -->
            <form action="" method="GET" class="form">
                <div class="leave">
                    <label for="from_date">From Date:</label>
                    <input type="date" id="from_date" name="from_date">
                    <label for="to_date">To Date:</label>
                    <input type="date" id="to_date" name="to_date">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <input type="submit" value="Filter" class="btn">
                </div>
            </form>

            <!-- Attendance table -->
            <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Arrival Time</th>
                    <th>Leave Time</th>
                    <th>Status</th>
                </tr>
                <?php
                // Include database connection file
                include 'db_connection.php';

                // Initialize variables for filters
                $from_date = $_GET['from_date'] ?? '';
                $to_date = $_GET['to_date'] ?? '';
                $name = $_GET['name'] ?? '';

                // Build SQL query with filters
                $sql = "SELECT Date, Name, Arrival_time, Leave_time, status FROM attendance WHERE 1=1";
                if (!empty($from_date)) {
                    $sql .= " AND Date >= '$from_date'";
                }
                if (!empty($to_date)) {
                    $sql .= " AND Date <= '$to_date'";
                }
                if (!empty($name)) {
                    $sql .= " AND Name LIKE '%$name%'";
                }

                // Execute SQL query
                $result = $conn->query($sql);

                // Check if any rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Arrival_time"] . "</td>";
                        echo "<td>" . $row["Leave_time"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }

                // Close database connection
                $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>

</html>