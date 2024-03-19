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
    <title>Update Employee</title>
    <style>
       
    </style>    
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
        
    
        <div class= main>
        <div class="container">    
          
        <!-- update form -->
      
        <h1 class="head">Update Employee</h1><br><br>

        <form action="add_employee.php" method="post" id="updateForm">

            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Member number</legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="inputnic" placeholder="111" onkeyup="fetchMemberData()" required>
                        <div class="invalid-feedback">
                            Please provide a valid member number.
                        </div>
                    </div>
            </div><br><br>

            <!-- Other form fields with similar validation as above -->

            <input class="btn btn-primary" type="submit" value="Update" style="color:black;">
            <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
        </form>

        <script>
          function fetchMemberData() {
            const memberNumber = $('#inputnic').val();

            if (memberNumber.length === 0) {
              // Clear form fields if member number is empty
              $('#name').val('');
              $('#lastName').val('');
              $('#maleRadio').prop('checked', false);
              $('#femaleRadio').prop('checked', false);
              $('#address').val('');
              $('#tpNo').val('');
              $('#nic').val('');
              $('#accountNumber').val('');
              $('#bankSelect').prop('disabled', true);
              $('#workSelect').prop('disabled', true);
              $('#dateOfBirth').val('');
              return;
            }

            // Make an AJAX request to a PHP script (fetch_member_data.php) to retrieve data
            $.ajax({
              url: 'fetch_member_data.php',
              type: 'post',
              data: { memberNumber: memberNumber },
              success: function(response) {
                const data = JSON.parse(response);

                // Update form fields based on the response data
                if (data) {
                  $('#name').val(data.name);
                  $('#lastName').val(data.last_name);
                  if (data.gender === 'Male') {
                    $('#maleRadio').prop('checked', true);
                  } else {
                    $('#femaleRadio').prop('checked', true);
                  }
                  $('#address').val(data.address);
                  $('#tpNo').val(data.tp_no);
                  $('#nic').val(data.nic);
                  $('#accountNumber').val(data.account_number);
                  $('#bankSelect').val(data.bank).prop('disabled', false);
                  $('#workSelect').val(data.work_place).prop('disabled', false);
                  $('#dateOfBirth').val(data.date_of_birth);
                } else {
                  // Display an error message if no data is found
                  alert('No data found for member number: ' + memberNumber);
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
              }
            });
          }
        </script>
      </div>
    </div>
  </section>
</body>
</html>
