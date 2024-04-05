<?php
include('ConnectionModel.php');
$success = '';

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data based on selected workplace
if(isset($_POST['workSelect'])){
    $workSelect = $_POST['workSelect'];

    // Perform SQL query to fetch employee details based on selectedWork
    $sql = "SELECT e.Member_No, e.F_name, e.L_name, e.DOB, e.Gender, e.Address, e.Mobile, e.NIC,
            ad.Acc_No, bd.Bank_Name, p.Position_name, pay.Pay_name
            FROM employee AS e
            JOIN accountdetails AS ad ON e.EMP_ID = ad.EMP_ID
            JOIN bankdetails AS bd ON ad.bank_id = bd.bank_id
            JOIN positions AS p ON e.Position_ID = p.Position_ID
            JOIN paymethod AS pay ON e.Pay_ID = pay.Pay_ID
            JOIN workplace AS w ON e.work_ID = w.work_ID
            WHERE w.name = ?";
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $bindResult = $stmt->bind_param("s", $workSelect);
    if ($bindResult === false) {
        die("Error binding parameters: " . $stmt->error);
    }
    
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Build the HTML for the table of employee data
    $output = '';
    if($result->num_rows > 0){
        $output .= "<table>";
        $output .= "<tr><th>Member no</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Position</th><th>Gender</th><th>Address</th>
        <th>Telephone Number</th><th>NIC Number</th><th>Account Number</th><th>Bank</th><th>Payment Method</th></tr>";
        while($row = $result->fetch_assoc()){
            $output .= "<tr><td>".$row['Member_No']."</td><td>".$row['F_name']."</td><td>".$row['L_name']."</td><td>".$row['DOB']."</td><td>"
            .$row['Position_name']."</td><td>".$row['Gender']."</td><td>".$row['Address']."</td><td>".$row['Mobile']."</td><td>".$row['NIC']."</td><td>"
            .$row['Acc_No']."</td><td>".$row['Bank_Name']."</td><td>".$row['Pay_name']."</td></tr>";
        }
        $output .= "</table>";
    } else {
        $output .= "No results found";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Output the table of employee data
    echo $output;
    exit; // Terminate the script after outputting the table
}
?>

<!DOCTYPE HTML>  
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" > 
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>        
    
    <div class="wrapper">
            <aside id="sidebar">
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-grid-alt"></i>
                    </button>
                    <div class="sidebar-logo">
                        <a href="#">Admin Dashborad</a>
                    </div>
                </div>
                <ul class="sidebar-nav">


                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="lni lni-user"></i>
                            <span>Employee Section</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="Add.php" class="sidebar-link">Add Employees</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Employees</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="lni lni-agenda"></i>
                            <span>Attendance Section</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Attendance</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Leave</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="lni lni-dollar"></i>
                            <span>Salary Section</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Salary Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="lni lni-book"></i>
                            <span>Inventory Section</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Inventory Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="lni lni-agenda"></i>
                            <span>Workplace Section</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Add Workplaces</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">View Workplaces</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="sidebar-footer">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </aside>

            <div class="main--content">
                <div class="header--wrapper">
                    <div class="header--title">
                    
                        <h2>Dashboard</h2>
                    </div>
                    <div class="user--info">
                        <div class="search--box">
                        <i class="lni lni-search"></i>
                        <input type="text" placeholder="Search"/>
                        </div>
                        <img src="img.png" alt=""/>
                    </div>    
                </div>
                <?php
                    if(!empty($success)){
                        print $success;
                    }
                ?>

                <section>
                    <div class= main>
                        <div class="container">    
                            <h1 class="head">View Employee details</h1><br><br>
                            <!--Dropdown to select workplace-->
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Choose Working Place</legend>
                                <div class="col-auto">
                                    <select class="form-select" id="workSelect" name="workSelect" aria-label="work Selection">
                                        <option value="">Choose the Working Place</option>
                                        <option value="Work1">Telecom - Mathale</option>
                                        <option value="work2">Telecom OPMC - Anuradhapura</option>
                                        <option value="work3">Toyota - Anuradhapura</option>
                                        <option value="work4">Telecom - Kurunegala</option>
                                        <option value="work5">CEB - Mannar</option>
                                        <option value="work6">Water Board - Thisa wewa</option>
                                        <option value="work7">Telecom - Trincomalee</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-primary" id="searchButton" style="color:black;">Search Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Container to display search results -->
                <div id="searchResults"></div>

                <script>
                    // JavaScript code to handle the button click event
                    $(document).ready(function(){
                        $("#searchButton").click(function(){
                            var workSelect = $("#workSelect").val();
                            // AJAX call to fetch data from the server
                            $.ajax({
                                url: "", 
                                method: "POST",
                                data: { workSelect: workSelect },
                                success: function(response){
                                    $("#searchResults").html(response);
                                }
                            });
                        });
                    });
                </script>


            </div> 
        </div>
            
                
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
                

    
</body>
</html>