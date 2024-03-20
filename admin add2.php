<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
    <div class="main">
        <div class="container">    
            <!-- Form for adding employee details -->
            <h1 class="head">Add New Employee</h1><br><br>
            <form id="addEmployeeForm" action="add_employee.php" method="post" onsubmit="return validateForm()">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Member number</legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="inputMemberNumber" placeholder="111">
                    </div>
                </div><br><br>
  
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Name</legend>
                    <div class="col">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last name" aria-label="Last name">
                    </div>
                </div><br><br>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Female">
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
                        <input type="text" class="form-control" id="inputNIC" placeholder="12345678V">
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Account Number</legend>
                    <div class="col">
                        <input type="text" class="form-control" id="inputAccountNumber" placeholder="Account number">
                    </div>
                    <div class="col">
                        <select class="form-select" id="bankSelect" aria-label="Bank Selection">
                            <option value="">Choose a bank...</option>
                            <option value="BOC">BOC</option>
                            <option value="People's Bank">People's Bank</option>
                            <option value="Commercial">Commercial</option>
                        </select>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Working Place</legend>
                    <div class="col-auto">
                        <select class="form-select" id="workSelect" aria-label="work Selection">
                            <option value="">Choose the Working Place</option>
                            <option value="Telecom - Mathale">Telecom - Mathale</option>
                            <option value="Telecom OPMC - Anuradhapura">Telecom OPMC - Anuradhapura</option>
                            <option value="Toyota - Anuradhapura">Toyota - Anuradhapura</option>
                            <option value="Telecom - Kurunegala">Telecom - Kurunegala</option>
                            <option value="CEB - Mannar">CEB - Mannar</option>
                            <option value="Water Board - Thisa wewa">Water Board - Thisa wewa</option>
                            <option value="Telecom - Trincomalee">Telecom - Trincomalee</option>
                        </select>
                    </div>
                </div><br><br>
                   
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Date Of Birth</legend>
                    <div class="col-auto">
                        <input type="date" class="form-control" id="inputDOB">
                    </div>
                </div><br><br>
               

                <input class="btn btn-primary" type="submit" value="Submit">
                <input class="btn btn-primary" type="reset" value="Reset">
            </form>
        </div>
    </div>
</section>

<script>
    function validateForm() {
        var phoneNumber = document.getElementById('inputTPno').value;
        var nicNumber = document.getElementById('inputNIC').value;
        var accountNumber = document.getElementById('inputAccountNumber').value;

        // Validate phone number
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phoneNumber)) {
            alert("Please enter a valid 10-digit phone number.");
            return false;
        }

        // Validate NIC number
        var nicRegex = /^\d{9}[vVxX]$/;
        if (!nicRegex.test(nicNumber)) {
            alert("Please enter a valid NIC number.");
            return false;
        }

        // Validate account number
        if (accountNumber.trim() === "" || isNaN(accountNumber)) {
            alert("Please enter a valid account number.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
