<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <style>
        #sidebar {
			background-color: #083C71;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background: #083C71;
            color: #fff;
            transition: all 0.3s;
        }
		
        .sidebar-header, .sidebar-item {
            padding: 20px;
        }
        .sidebar-item a {
            color: #fff;
            text-decoration: none;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .info-card {
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        canvas {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="sidebar-header">
            <h3>Inventory Dashboard</h3>
        </div>
        <ul class="list-unstyled">
            <li class="sidebar-item">
                <a href="#toolSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="lni lni-cog"></i> Tool Management
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
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="info-card bg-primary">
                    <h4>Total Products</h4>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-card bg-warning">
                    <h4>Low Stock Products</h4>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-card bg-success">
                    <h4>Most Stock Products</h4>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-card bg-danger">
                    <h4>Zero Stock Products</h4>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-12">
                <h2>Stock Overview</h2>
                <canvas id="stockChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        // Dummy data for stock
        const stockData = [
            { name: 'Total Products', quantity:20  },
            { name: 'Low Stock Products', quantity: 19 },
            { name: 'Most Stock Products', quantity:3  }
        ];

        // Prepare data for stock pie chart
        const stockLabels = stockData.map(tool => tool.name);
        const stockQuantity = stockData.map(tool => tool.quantity);

        const stockCtx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(stockCtx, {
            type: 'pie',
            data: {
                labels: stockLabels,
                datasets: [{
                    label: 'Stock Overview',
                    data: stockQuantity,
                    backgroundColor: ['red', 'blue', 'green'],
                    borderColor: ['black', 'black', 'black'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
