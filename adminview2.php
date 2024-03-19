<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body> 

<!-- side navigation-->
<div class="sidenav">
  <button class="dropdown-btn">Employee Section</button>
  <div class="dropdown-container">
    <a href="Admin_Addemp_form" target="_blank">Add Employee</a>
    <a href="Admin_Viewemp">View Employee</a>
    <a href="Admin_Update_form" target="_blank">Update Employee</a>
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

<section>        
  <div class="main">
    <div class="container">    
      <!-- Form for viewing employee details -->
      <h1 class="head">View Employee details</h1><br><br>
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Choose Working Place</legend>
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
        <div class="col-auto">
          <button type="button" class="btn btn-primary" id="searchButton" style="color:black;">Search Details</button>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // JavaScript for form validation
  document.getElementById('searchButton').addEventListener('click', function() {
    var selectedOption = document.getElementById('workSelect').value;
    if (selectedOption === "") {
      alert("Please select a working place.");
      return false;
    }
    // If validation passes, you can proceed with further actions like submitting the form or triggering the search
    // For now, just showing an alert
    alert("Search initiated for: " + selectedOption);
  });
</script>

</body>
</html>
