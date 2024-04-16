<?php
include('ConnectionModel.php');
$success='';

$work_ID = isset($_GET['id']) ? $_GET['id'] : null;

if ($work_ID !== null) {
    // Assuming $conn is your database connection
    $query = "SELECT * FROM `workplace` WHERE `work_ID`= '$work_ID'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
       
    }
} else {
    echo "ID is not set.";
}

if(isset($_POST['update'])){

    if(isset($_GET['Newwork_ID'])){
        $Newwork_ID = $_GET['Newwork_ID'];
    }

    $name = $_POST['name'];
    $Address = $_POST['Address'];
    $Owner_name = $_POST['Owner_name'];
    $Owner_mobile = $_POST['Owner_mobile'];

    $query = "UPDATE `workplace` SET `name` = '$name', `Address` = '$Address', 
    `Owner_name` = '$Owner_name', `Owner_mobile` = '$Owner_mobile' WHERE `work_ID`= '$Newwork_ID' ";


    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed".mysqli_error($conn));
    }else{
        header("Location:Workview.php");
        exit(); 
    }


}

/*
$work_ID = isset($_GET['work_ID']) ? $_GET['work_ID'] : null;

if ($work_ID !== null) {
    // Assuming $conn is your database connection
    $query = "SELECT * FROM `workplace` WHERE `work_ID`= '$work_ID'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_row($result);
        print_r($row);
    }
} else {
    echo "Work ID is not set.";
}
*/

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
                                <a href="view.php" class="sidebar-link">View Employees</a>
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
                                <a href="Workview.php" class="sidebar-link">View Workplaces</a>
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
                            <h1 class="head">Edit Employee details</h1><br><br>

                            <form action="Workedit.php?Newwork_ID=<?php echo $work_ID; ?>" method="post">
                                <input type="hidden" name="work_ID" value="<?php echo $work_ID; ?>">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Name: </legend>
                                    <div class="col">
                                   
                                        <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
                                   
                                    </div>
                                </div><br><br>
                                
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Address: </legend>
                                    <div class="col">
                                       
                                            <input type="text" class="form-control" name="Address" value="<?php echo $row['Address']?>">
                                       
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Owner/Supervisor Name: </legend>
                                    <div class="col">
                                        
                                            <input type="text" class="form-control" name="Owner_name" value="<?php echo $row['Owner_name']?>" >
                                          
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Owner/Supervisor Telephone number:</legend>
                                    <div class="col-auto">
                                        
                                            <input type="text" class="form-control" name="Owner_mobile"  value="<?php echo $row['Owner_mobile']?>">
                                        
                                    </div>
                                </div><br><br>

                                <div>
                                    <button type="submit" class="btn btn-success" name="update" >Update</button>
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>    


            </div> 
        </div>
            
                
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
                

    
</body>
</html>