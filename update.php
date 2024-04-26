<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: calc(100% - 160px);
            margin-left: 160px;
            text-align: center;
            margin-top: 50px;
        }
        .sidebar {
            position: fixed;
            width: 150px;
            height: 100%;
            background-color: #333;
            color: white;
            padding: 20px 5px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }
        input, select {
            padding: 5px;
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
        <h3>Menu</h3>
        <p><a href="#updateStock">Update Stock</a></p>
        <p><a href="/other-page">Other Page</a></p>
    </div>
    <div class="container">
        <h2>Update Stock</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="tool_id">Tool ID:</label>
            <input type="text" id="tool_id" name="tool_id" required><br>
            <label for="tool_name">Tool Name:</label>
            <input type="text" id="tool_name" name="tool_name" readonly><br>
            <label for="current_quantity">Current Quantity:</label>
            <input type="text" id="current_quantity" name="current_quantity" readonly><br>
            <label for="new_quantity">New Quantity:</label>
            <input type="number" id="new_quantity" name="new_quantity" required><br>
            <label for="purchase_date">Purchase Date:</label>
            <input type="date" id="purchase_date" name="purchase_date" readonly><br>
            <button type="submit" name="update_stock">Update Stock</button>
        </form>
    </div>

    <script>
        document.getElementById('tool_id').addEventListener('input', function() {
            var toolId = this.value;
            if (toolId) {
                fetch('fetch_stock.php?tool_id=' + toolId)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('tool_name').value = data.tool_name || '';
                        document.getElementById('current_quantity').value = data.current_quantity || '';
                        document.getElementById('purchase_date').value = data.purchase_date || '';
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('tool_name').value = '';
                document.getElementById('current_quantity').value = '';
                document.getElementById('purchase_date').value = '';
            }
        });
    </script>
</body>
</html>
