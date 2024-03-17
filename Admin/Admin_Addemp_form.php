<?php

// Define variables and initialize with empty values
$firstName = $lastName = $gender = $address = $telephoneNumber = $nicNumber = $accountNumber = $bank = $workingPlace = $dob = "";
$firstNameErr = $lastNameErr = $genderErr = $addressErr = $telephoneNumberErr = $nicNumberErr = $accountNumberErr = $bankErr = $workingPlaceErr = $dobErr = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    // Validate last name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = test_input($_POST["lastName"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Validate address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    // Validate telephone number
    if (empty($_POST["telephoneNumber"])) {
        $telephoneNumberErr = "Telephone number is required";
    } else {
        $telephoneNumber = test_input($_POST["telephoneNumber"]);
        // Check if telephone number is valid
        if (!preg_match("/^\d{10}$/", $telephoneNumber)) {
            $telephoneNumberErr = "Invalid telephone number";
        }
    }

    // Validate NIC number
    if (empty($_POST["nicNumber"])) {
        $nicNumberErr = "NIC number is required";
    } else {
        $nicNumber = test_input($_POST["nicNumber"]);
        // Check if NIC number is valid
        if (!preg_match("/^[0-9]{12}[vVxX]$/", $nicNumber)) {
            $nicNumberErr = "Invalid NIC number";
        }
    }

    // Validate account number
    if (empty($_POST["accountNumber"])) {
        $accountNumberErr = "Account number is required";
    } else {
        $accountNumber = test_input($_POST["accountNumber"]);
    }

    // Validate bank
    if (empty($_POST["bank"])) {
        $bankErr = "Bank is required";
    } else {
        $bank = test_input($_POST["bank"]);
    }

    // Validate working place
    if (empty($_POST["workingPlace"])) {
        $workingPlaceErr = "Working place is required";
    } else {
        $workingPlace = test_input($_POST["workingPlace"]);
    }

    // Validate date of birth
    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    // If all validations pass, you can proceed to process the data
    // For example, you can insert the data into a database

}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zDj2lLWQ9zUSw456eOUgi6IzxBQieHIKTmrwGkLt9q9sI+34KbTVBsVCs0VAONIO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add Employee</title>
    <style>
       
    </style>    
</head>
<body> 

<!-- side navigation-->
<div class="sidenav">
  <button class="dropdown-btn">Employee Section</button>
  <div class="dropdown-container">
    <a href="Admin_Addemp_form">Add Employee</a>
    <a href="Admin_Viewemp">View Employee</a>
    <a href="Admin_Update_form.">Update Employee</a>
  </div>

  <button class="dropdown-btn">Inventory Section</button>
  <div class="dropdown-container">
    <a href="#">View Inventory</a>
  </div>

  <button class="dropdown-btn">Leave and Attendance Section</button>
  <div class="dropdown-container">
    <a href="#">View Attendance</a>
    <a href="#">View leave</a>
  </div>

  <button class="dropdown-btn">Salary Section</button>
  <div class="dropdown-container">
    <a href="#">View Salary</a>
  </div>
</div>
         

 <!-- Header-->
   
<nav class="navbar">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
    <img src="logo.png" alt="logo" style="width:100px";>
  </a>
    <a class="navbar-brand">Employee Management System</a>
  </div>
</nav>

<!-- Form to add employee-->

    <section>
        
    
        <div class= main>
        <div class="container"> 
        
            
            <h1 class="head">Add New Employee</h1><br><br>

            <form action="add\_employee.php" method="post">

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Member number</legend>
                    <div class="col-auto">
                    <input type="text" class="form-control" id="inputnic" placeholder="111">
                    </div>
                </div><br><br>
  
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Name</legend>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div><br><br>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                            Female
                            </label>
                        </div>
                    </div>
                </fieldset><br>       

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Address</legend>
                    <div class="col">
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Telephone number</legend>
                    <div class="col-auto">
                    <input type="text" class="form-control" id="inputTPno" placeholder="0123456789">
                    </div>
                </div><br><br>


                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">NIC number</legend>
                    <div class="col-auto">
                    <input type="text" class="form-control" id="inputnic" placeholder="12345678V">
                    </div>
                </div><br><br>

                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Account Number</legend>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Account number" aria-label="Account Number">
                    </div>
                    <div class="col">
                        <select class="form-select" id="bankSelect" aria-label="Bank Selection">
                            <option value="">Choose a bank...</option>
                            <option value="bank1">BOC</option>
                            <option value="bank2">People's Bank</option>
                            <option value="bank3">Commercial</option>
                        </select>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">working Place</legend>
                    <div class="col-auto">
                        <select class="form-select" id="workSelect" aria-label="work Selection">
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
                </div><br><br>
                     
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Date Of Birth</legend>
                    <div class="col-auto">
                    <input type="date" class="form-control" id="inputDOB" placeholder="DD/MM/YYYY">
                    </div>
                </div><br><br>
               

                <input class="btn btn-primary" type="submit" value="Submit" style="color:black;">
                <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
            </form>


        </div>
        </div>
    </section>




</body>
</html>

