<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Submission Form</title>
    <style>
        /* Add your CSS styles here */
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
            <h1>Leave Submission Form</h1>
            <div class="leave">
                <form action="submit_leave.php" method="post" class="form">
                    <label for="employee">Employee Name:</label>
                    <select name="employee" id="employee">
                        <option value="" selected disabled>Select...</option>
                        <?php include 'db_connection.php'; ?>
                        <?php
                        // Fetch employee names from the employee table
                        $sql = "SELECT EMP_ID, F_name, L_name FROM employee";
                        $result = $conn->query($sql);

                        // Populate the dropdown with employee names
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['EMP_ID'] . "'>" . $row['F_name'] . " " . $row['L_name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No employees found</option>";
                        }
                        ?>
                    </select><br><br>

                    <label for="leave_type">Leave Type:</label>
                    <select name="leave_type" id="leave_type">
                        <option value="" selected disabled>Select...</option>
                        <?php
                        // Fetch leave types from the Leaves table
                        $sql = "SELECT description FROM leaves";
                        $result = $conn->query($sql);

                        // Populate the dropdown with leave types
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['description'] . "'>" . $row['description'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No leave types found</option>";
                        }
                        ?>
                    </select><br><br>

                    <label for="from_date">From Date:</label>
                    <input type="date" name="from_date" id="from_date"><br><br>
                    <label for="to_date">To Date:</label>
                    <input type="date" name="to_date" id="to_date"><br><br>
                    <label for="leave_duration">Leave Duration:</label>
                    <select name="leave_duration" id="leave_duration">
                        <option value="" selected disabled>Select...</option>
                        <option value="Half Day">Half Day</option>
                        <option value="Full Day">Full Day</option>
                    </select><br><br>
                    <label for="notes">Notes:</label><br>
                    <textarea name="notes" id="notes" rows="4" cols="50"></textarea><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            </form>
        </div>
    </div>

</body>

</html>