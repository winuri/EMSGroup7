<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool Inventory Management</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #083C71;	/* Navy blue background for sidebar */
            color: #fff;/* White text color for sidebar */
            height: 100vh;/* Full height of the viewport */
            width: 150px;/* Fixed width for sidebar */
            position: fixed;/* Fixed position to the left */
            top: 0;
            left: 0;
            padding-top: 20px;/* Padding at the top */
            text-align: left;/* Left-aligned text */
		}
		
		/* Navigation Bar Styles */
		.navbar {
		background-color: #083C71; /* Updated navy blue background color */
		padding-top: 10px; /* Adjusted padding for top */
		
        }
		
        .container {
            margin-left: 170px; /* Space for sidebar */
            padding-top: 80px; /* Space for fixed navbar */
            padding-left: 20px; /* Padding on the left */
        }
        table {
            width: 90%; /* Table width */
            border-collapse: collapse; /* Collapsed borders */
			 margin-top: 20px; /* Top margin */
            margin-bottom: 50px; /* Bottom margin */
            margin-left: auto; /* Align table to the right */
			
        }
		
		
		
        th, td {
            padding: 8px; /* Padding for table cells */
            text-align: left;/* Left aligned text in cells */
            border-bottom: 1px solid #ddd;/* Bottom border for table rows */
        }
        input, select, button {
            margin: 5px; /* Margin for form elements */
        }
		th {
            background-color: #ACDDFE;/* Header background color */
            color: black;/* Header text color */
        }
        tr:nth-child(even) {
            background-color: #DEF1FE;/* Background color for even rows */
		}
        
		
		

        .confirmationMessage {
            color: green; /* Green text color for confirmation messages */
            margin-top: 20px; /* Top margin */
        }
        /* Styles for Add Tool button */
        .add-tool-button, .cancel-button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px; /* Adjusted padding */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            width: 120px; /* Adjusted width */
        }

        /* Styles for Cancel button */
        .cancel-button {
            background-color: #f44336; /* Red */
        }
        canvas {
            max-width: 400px;
            max-height: 200px;
        }
		.sidebar ul {
    padding-left: 0; /* Remove default padding */
}
		
	.sidebar-item a {
    color: #fff; /* Adjusted link color */
    text-decoration: none;
    display: block; /* Make links full width */
    padding: 10px; /* Adjusted padding */
}

.sidebar-item a:hover {
    background-color: #2a2a72; /* Hover color */
}



.sidebar-item.active .collapse {
    display: block; /* Show submenu when parent is active */
}




.main-content {
            flex: 1;
            padding: 20px;
        }
		

 .highlight, .special-highlight {
            background-color: #009688; /* Highlight color */
        }
        img {
            width: 100px; /* Increased image size for better visibility */
            height: auto;
        }
        .details-panel {
            background-color: #e0f2f1; /* Light yellow background */
            border-left: 150px solid #009688; /* Bright yellow border */
            padding: 20px;
            margin-top: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            margin-right: 50px;
        }
        input[type="text"], button {
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
		
		
		.right-align {
    margin-left: 150px;
}


        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
		





		
    </style>
</head>
<body>


  <!-- Navigation Bar -->
    <div class="navbar">
        <div class="container">
            <!--<a href="#" class="logo">Tool Inventory Management</a>
            <nav>
                <ul>
                    <li><a href="#toolSubmenu">Tool Management</a></li>
                    <li><a href="reports.php">Reports</a></li>-->
                </ul>
            </nav>
        </div>
    </div>
	
	
    <div class="sidebar">
        <ul>
            <!-- Navigation items can be added here -->
			<ul class="list-unstyled">
            <li class="sidebar-item">
               <a href="#toolSubmenu" data-toggle="collapse" aria-expanded="false">
                 <i class="lni lni-cog"></i> <a href = "index.php">Tool Management</a>
                </a>
                <ul class="collapse list-unstyled" id="toolSubmenu">
                    <li class="sidebar-item">
                        <a href="add.php">Add Tool</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="delete new.php">Update Tool</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="delete new.php">Delete Tool</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="view.php">View Tools</a>
                    </li>
                </ul>
            </li>
        </ul>
        </ul>
    </div>
	
	 <!-- Main content -->
    <div class="main-content">
       <!-- <h2><center>Tool Inventory</center></h2>-->
        <form action="" method="get">
            <label for="searchToolID" class="right-align"><b>Enter Tool ID</b></label>
            <input type="text" id="searchToolID" name="toolID" required>
            <button type="submit">Search</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Tool ID</th>
                    <th>Image</th>
                    <th>Tool Name</th>
                    <th>Quantity</th>
                    <th>Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "1234"; // Use your password
                $dbname = "emsdatabase";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT Tool_ID, Tool_name, Quantity, Purchase_date FROM inventory";
                $result = $conn->query($sql);
                $searchToolID = isset($_GET['toolID']) ? $_GET['toolID'] : '';

                $selectedTool = null;

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        if ($row["Tool_ID"] == $searchToolID) {
                            $selectedTool = $row;
                            echo "<tr class='highlight'>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . htmlspecialchars($row["Tool_ID"]) . "</td>";
                        echo "<td><img src='path_to_image/" . htmlspecialchars($row["Tool_ID"]) . ".jpg' alt='Tool Image' onError=\"this.onerror=null;this.src='path_to_default_image/default.jpg';\"></td>";
                        echo "<td>" . htmlspecialchars($row["Tool_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Quantity"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Purchase_date"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No results found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <?php
        if ($selectedTool) {
            echo "<div class='details-panel'>";
            echo "<h3>Highlighted Tool Details:</h3>";
            echo "<p><strong>Tool ID:</strong> " . htmlspecialchars($selectedTool["Tool_ID"]) . "</p>";
            echo "<p><img src='path_to_image/" . htmlspecialchars($selectedTool["Tool_ID"]) . ".jpg' alt='Tool Image' onError=\"this.onerror=null;this.src='path_to_default_image/default.jpg';\"></p>";
            echo "<p><strong>Tool Name:</strong> " . htmlspecialchars($selectedTool["Tool_name"]) . "</p>";
            echo "<p><strong>Quantity:</strong> " . htmlspecialchars($selectedTool["Quantity"]) . "</p>";
            echo "<p><strong>Purchase Date:</strong> " . htmlspecialchars($selectedTool["Purchase_date"]) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
        
</body>
</html>