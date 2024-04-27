<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tool</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <style>
        #sidebar {
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background: #333;
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
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="sidebar-header">
            <h3>Admin Dashboard</h3>
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
                        <a href="update.php">Update Tool</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="delete.php">Delete Tool</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="view.php">View Tools</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Add a New Tool</h1>
        <form method="POST" action="process_add_tool.php"> <!-- process_add_tool.php should handle the server-side logic -->
            <div class="form-group">
                <label for="toolName">Tool Name</label>
                <input type="text" class="form-control" id="toolName" name="toolName" required>
            </div>
            <div class="form-group">
                <label for="toolDescription">Description</label>
                <textarea class="form-control" id="toolDescription" name="toolDescription" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Tool</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        $('[data-toggle="collapse"]').on('click', function() {
            let target = $(this).attr('data-target');
            $(target).collapse('toggle');
        });
    </script>
</body>
</html>
