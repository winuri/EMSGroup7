<?php
// Include the database connection file
include 'db_connection.php';

// Initialize variables for filtering
$from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
$to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';

// Build the SQL query with filters if any
$sql = "SELECT `Date`, `Name`, `Arrival_time`, `Leave_time`, `status` FROM `attendance` WHERE 1";

if ($from_date) {
    $sql .= " AND `Date` >= '$from_date'";
}

if ($to_date) {
    $sql .= " AND `Date` <= '$to_date'";
}

if ($name) {
    $sql .= " AND `Name` LIKE '%$name%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function loadPage(url) {
            document.getElementById('iframe').src = url;
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td a {
            color: #007BFF;
            text-decoration: none;
            margin-right: 5px;
        }
        td a:hover {
            text-decoration: underline;
        }
        td:last-child {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 800px;
            border: 1px solid #ddd;
        }
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .leave input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100px;
        }
        .leave input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .leave input[type="date"],
        .leave input[type="text"],
        .leave input[type="submit"] {
            flex: 1 1 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <!-- Sidebar iframe -->
            <iframe id="sidebar-iframe" src="sidebar.html" width="100%" height="100%" style="border: none;" title="Sidebar"></iframe>
        </div>
        <div class="content">
            <h1>Attendance Page</h1>
            <form action="" method="GET" class="form">
                <div class="leave">
                    <label for="from_date">From Date:</label>
                    <input type="date" id="from_date" name="from_date" value="<?php echo $from_date; ?>">
                    <label for="to_date">To Date:</label>
                    <input type="date" id="to_date" name="to_date" value="<?php echo $to_date; ?>">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                    <input type="submit" value="Filter" class="btn">
                </div>
                <br>
                <div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Arrival Time</th>
                            <th>Leave Time</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['Date']}</td>
                                    <td>{$row['Name']}</td>
                                    <td>{$row['Arrival_time']}</td>
                                    <td>{$row['Leave_time']}</td>
                                    <td>{$row['status']}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
