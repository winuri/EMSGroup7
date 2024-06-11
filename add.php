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
            background-color: #083C71;
            color: #fff;
            height: 100vh;
            width: 150px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            text-align: left;
		}
		
		/* Navigation Bar Styles */
		.navbar {
		background-color: #083C71;	 /* Updated navy blue background color */
		padding-top: 10px; 			 /* Adjusted padding for top */
		
        }
		
        .container {
            margin-left: 170px;
            padding-top: 80px;
            padding-left: 20px;
        }
        table {
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        input, select, button {
            margin: 5px;
        }
		th {
            background-color: #ACDDFE;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #DEF1FE;
		}
        .low-stock {
            background-color: white;	 /* Reddish background for low stock */
        }
		
		

        .confirmationMessage {
            color: green; 
            margin-top: 20px;
        }
        /* Styles for Add Tool button */
        .add-tool-button, .cancel-button {
            background-color: #4CAF50; 		/* Green */
            border: none;
            color: white;
            padding: 10px 20px; 			/* Adjusted padding */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            width: 120px; 					/* Adjusted width */
        }

        /* Styles for Cancel button */
        .cancel-button {
            background-color: #f44336; 		/* Red */
        }
        canvas {
            max-width: 400px;
            max-height: 200px;
        }
		.sidebar ul {
    padding-left: 0; 						/* Remove default padding */
}
		
	.sidebar-item a {
    color: #fff; 							/* Adjusted link color */
    text-decoration: none;
    display: block; 						/* Make links full width */
    padding: 10px; 							/* Adjusted padding */
}

.sidebar-item a:hover {
    background-color: #2a2a72; 				/* Hover color */
}



.sidebar-item.active .collapse {
    display: block; 						/* Show submenu when parent is active */
}
    </style>
</head>
<body>


  <!-- Navigation Bar -->
    <div class="navbar">
        <div class="container">
            
                </ul>
            </nav>
        </div>
    </div>
	
	
    <div class="sidebar">
        <ul>
            <!-- Navigation items  added here -->
			<ul class="list-unstyled">
            <li class="sidebar-item">
               <a href="#toolSubmenu" data-toggle="collapse" aria-expanded="false">
                 <i class="lni lni-cog"></i> <a href = "index.php">Tool Management</a>
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
        
    <div class="container">
        <h2>Low Stock Tools</h2>
        <table id="lowStockTable">
            <thead>
                <tr>
                    <th>Tool Name</th>
                    <th>Tool ID</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection setup
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $dbname = "emsdatabase";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch tools with low stock
                $sql = "SELECT Tool_name, Tool_ID, Quantity FROM inventory WHERE Quantity < 5 LIMIT 5"; // Limit to the first five low stock tools
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='low-stock'>";
                        echo "<td>" . $row["Tool_name"] . "</td>";
                        echo "<td>" . $row["Tool_ID"] . "</td>";
                        echo "<td>" . $row["Quantity"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No low stock tools</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <br>

        <!-- Chart Container -->
        <div style="width: 50%;">
            <canvas id="lowStockChart"></canvas>
        </div>
        <br>

        <h2>Add New Tool</h2>
        <br>
        <table id="toolTable">
            <thead>
                <tr>
                    <th>Tool Name</th>
                    <th>Tool ID</th>
                    <th>Quantity</th>
                    <th>Purchase Date</th>
                    <th>Tool Photo</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>
                        <select id="newToolName" onchange="fillToolId()">
                            <?php
                            // Re-establish connection if necessary or use existing open connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Query to fetch distinct tool names from the Inventory table
                            $sql = "SELECT DISTINCT Tool_name FROM inventory ORDER BY Tool_name"; // Ordering by Tool_name for better user experience
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row["Tool_name"]) . "'>" . htmlspecialchars($row["Tool_name"]) . "</option>";
                                }
                            } else {
                                echo "<option>No tools available</option>";
                            }
                            
                            $conn->close();
                            ?>
                        </select>
                    </td>
                    <td><input type="text" id="newToolId" placeholder="Tool ID" readonly></td>
                    <td><input type="number" id="newQuantity" placeholder="Quantity"></td>
                    <td><input type="date" id="newPurchaseDate"></td>
                    <td><input type="file" id="newToolPhoto"></td>
                    <td>
                        <button class="add-tool-button" onclick="addTool()">Add Tool</button>
                        <button class="cancel-button" onclick="clearInputs()">Cancel</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <!-- Rows will be added here dynamically -->
            </tbody>
        </table>
        <div id="confirmationMessage" class="confirmationMessage"></div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Fetch data for low stock tools from your database
        var lowStockData = {
            labels: [<?php
                // Fetching tool names for the chart
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT Tool_name FROM inventory WHERE Quantity < 5 LIMIT 5"; // Limiting to the first five low stock tools
                $result = $conn->query($sql);
                $toolNames = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($toolNames, $row["Tool_name"]);
                    }
                }
                echo '"' . implode('", "', $toolNames) . '"';
                $conn->close();
            ?>],
            datasets: [{
                label: "Quantity",
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // Red
					'rgba(75, 192, 192, 1)', // Green
                    'rgba(255, 206, 86, 0.2)', // Yellow
                    'rgba(153, 102, 255, 0.2)',// Purple shadow
                    'rgba(153, 102, 255, 0.2)' // Purple
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Red
                    'rgba(75, 192, 192, 1)', // Green
                    'rgba(255, 206, 86, 1)', // Yellow
                    'rgba(153, 102, 255, 0.2)',// Purple shadow
                    'rgba(153, 102, 255, 1)' // Purple
                ],
                borderWidth: 1,
                data: [<?php
                    // Fetching quantity for the first five low stock tools
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT Quantity FROM inventory WHERE Quantity < 5 LIMIT 5"; // Limiting to the first five low stock tools
                    $result = $conn->query($sql);
                    $quantities = array();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            array_push($quantities, $row["Quantity"]);
                        }
                    }
                    echo implode(', ', $quantities);
                    $conn->close();
                ?>]
            }]
        };

        // Render chart
        var ctx = document.getElementById('lowStockChart').getContext('2d');
        var lowStockChart = new Chart(ctx, {
            type: 'bar',
            data: lowStockData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function fillToolId() {
            var selectedToolName = document.getElementById("newToolName").value;
            var toolIdField = document.getElementById("newToolId");

            // Fetch Tool ID from the database based on the selected Tool Name
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the Tool ID field with the fetched value
                        toolIdField.value = xhr.responseText;
                    } else {
                        console.error('Failed to fetch Tool ID: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'get_tool_id.php?toolName=' + selectedToolName, true);
            xhr.send();
        }

        function addTool() {
            var name = document.getElementById("newToolName").value;
            var id = document.getElementById("newToolId").value;
            var quantity = document.getElementById("newQuantity").value;
            var date = document.getElementById("newPurchaseDate").value;
            var photo = document.getElementById("newToolPhoto").files[0];

            if (!name || !id || !quantity || !date || !photo) {
                document.getElementById("confirmationMessage").innerText = "Please fill all fields and select a photo to add a tool.";
                document.getElementById("confirmationMessage").style.color = 'red';
                return;
            }

            var table = document.getElementById("toolTable").getElementsByTagName('tbody')[0];
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = name;
            cell2.innerHTML = id;
            cell3.innerHTML = quantity;
            cell4.innerHTML = date;

            var img = document.createElement('img');
            img.src = URL.createObjectURL(photo);
            img.height = 50; // Adjust size as needed
            cell5.appendChild(img);

            document.getElementById("confirmationMessage").innerText = "Tool successfully added: " + name + " (ID: " + id + ")";
            document.getElementById("confirmationMessage").style.color = 'green';

            clearInputs(); // Clear inputs after adding
        }

        function clearInputs() {
            document.getElementById("newToolName").value = "";
            document.getElementById("newToolId").value = "";
            document.getElementById("newQuantity").value = "";
            document.getElementById("newPurchaseDate").value = "";
            document.getElementById("newToolPhoto").value = "";
        }
    </script>
</body>
</html>
