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
        .navbar {
            background-color: #083C71;
            padding-top: 10px;
        }
        .container {
            margin-left: 170px;
            padding-top: 80px;
            padding-left: 20px;
        }
        .sidebar ul {
            padding-left: 0;
        }
        .sidebar-item a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar-item a:hover {
            background-color: #2a2a72;
        }
        .sidebar-item.active .collapse {
            display: block;
        }
        table {
            width: 88%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 50px;
            margin-left: auto;
            margin-right: 15px;
        }
        th, td {
            border: 1px solid #009688;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #009688;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #e0f2f1;
        }
        button.edit-btn, button.delete-btn {
            padding: 5px 10px;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button.edit-btn {
            background-color: #2196F3;
        }
        button.edit-btn:hover {
            background-color: #0D47A1;
        }
        button.delete-btn {
            background-color: #FF5722;
        }
        button.delete-btn:hover {
            background-color: #D84315;
        }
        .form-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #E8DAEF;
            padding: 20px;
            border: 2px solid #009688;
            z-index: 999;
        }
        .form-box input, .form-box button {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        .close-btn {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <!-- Add navigation items if needed -->
        </div>
    </div>
    <div class="sidebar">
        <ul>
            <ul class="list-unstyled">
                <li class="sidebar-item">
                    <a href="#toolSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="lni lni-cog"></i> <a href="index.php">Tool Management</a>
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
    <div class="main-content">
        <h2>Tool List</h2>
        <table>
            <thead>
                <tr>
                    <th>Tool Name</th>
                    <th>Tool ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $dbname = "emsdatabase";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT Tool_ID, Tool_name, Quantity, Price, purchase_date FROM inventory";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='tool-{$row["Tool_ID"]}'>";
                        echo "<td>" . htmlspecialchars($row["Tool_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Tool_ID"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Quantity"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Price"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["purchase_date"]) . "</td>";
                        echo "<td><button class='edit-btn'>Edit</button></td>";
                        echo "<td><button class='delete-btn' data-tool-id='" . $row["Tool_ID"] . "'>Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No tools available</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="form-box">
            <button class="close-btn">&times;</button>
            <h3>Edit Tool Details</h3>
            <form action="update_tool.php" method="post">
                <input type="hidden" name="toolId" id="editToolId">
                <input type="text" name="toolName" id="editToolName" placeholder="Tool Name">
                <input type="number" name="quantity" id="editQuantity" placeholder="Quantity">
                <input type="number" name="Price" id="editPrice" placeholder="Price">
                <input type="date" name="purchaseDate" id="editPurchaseDate" placeholder="Purchase Date">
                <button type="submit">Save Changes</button>
                <button type="button" class="close-btn">Close</button>
            </form>
        </div>
    </div>
    <script>
        // Edit button functionality
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.parentNode.parentNode;
                var toolId = row.children[1].textContent;
                var toolName = row.children[0].textContent;
                var quantity = row.children[2].textContent;
                var price = row.children[3].textContent;
                var purchaseDate = row.children[4].textContent;
                document.getElementById('editToolId').value = toolId;
                document.getElementById('editToolName').value = toolName;
                document.getElementById('editQuantity').value = quantity;
                document.getElementById('editPrice').value = price;
                document.getElementById('editPurchaseDate').value = purchaseDate;
                document.querySelector('.form-box').style.display = 'block';
            });
        });

        // Delete button functionality
        
          document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var toolId = this.getAttribute('data-tool-id');
        var confirmation = confirm("Are you sure you want to delete this tool?");
        
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText.trim();
                        
                        if (response === 'Record deleted successfully') {
                            var toolRow = document.getElementById('tool-' + toolId);
                            
                            if (toolRow) {
                                toolRow.remove();
                            }
                        } else {
                            alert(response);
                        }
                    } else {
                        console.error('Failed to delete tool: ' + xhr.status);
                        alert("Failed to delete tool. Please try again.");
                    }
                }
            };

            xhr.onerror = function() {
                console.error('An error occurred during the delete request.');
                alert("An error occurred during the delete request. Please try again.");
            };

            xhr.open('POST', 'delete_tool.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('Tool_ID=' + encodeURIComponent(toolId));
        }
    });
});
          

        // Close button functionality
        document.querySelectorAll('.close-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                document.querySelector('.form-box').style.display = 'none';
            });
        });
    </script>
</body>
</html>
