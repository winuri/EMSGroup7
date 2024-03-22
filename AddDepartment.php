<?php include("../model/DepartmentModel.php");
	
	if(isset($_SESSION['officeUserName']))
	{
		if ($_SESSION['empType'] == 2 || $_SESSION['empType'] == 1)
	{
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Employee Management System</title>

			<!-- Bootstrap Core CSS -->
			<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="../assets/css/simple-sidebar.css" rel="stylesheet">

			<!-- Online FA CDN -->
			<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->

		</head>

		<body>

			<div id="wrapper">

				<!-- Sidebar -->
				<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
					<h2 style="color:white">Admin Dashboard</h2>
						<li class="sidebar-brand">
							
						</li>
						
						<li>
							<a href="UserProfile.php"><i class="fas fa-user-circle"></i> User Profile</a>
						</li>
							<?php
							$objLeaveApplication = new Department();
							$result = $objLeaveApplication->getForRecomandationNumber();
							while($row = mysqli_fetch_array($result))
							{ 
							?>
					
							<?php
							}
							$objLeaveApplication = new Department();
							$result = $objLeaveApplication->getRecomandationNumber();
							while($row = mysqli_fetch_array($result))
							{ 
							?>
					
							<?php
							}
							?>
						<li>
							<a style="color:#DAA520;" href="AddDepartment.php"><i class="fas fa-plus"></i> Add Workplace</a>
						</li>
						<li>
							<a href="ListDepartment.php"><i class="fas fa-stream"></i> List Workplace</a>
						</li>
						<li>
							<a href="AddDesignation.php"><i class="fas fa-plus"></i> Add Designation</a>
						</li>
						<li>
							<a href="ListDesignation.php"><i class="fas fa-stream"></i> List Designation</a>
						</li>
						<li>
							<a href="AddEmployee.php"><i class="fas fa-plus"></i> Add Employee</a>
						</li>
						<li>
							<a href="ListEmployee.php"><i class="fas fa-stream"></i> List Employee</a>
						</li>
						<li>
							<a href="UsersLeaveDetails.php"><i class="fas fa-clipboard-list"></i> User's Leave Details</a>
						</li>
				
						<li>
							<a href="../controller/LogoutController.php"><i class="fas fa-power-off"></i> Logout</a>
						</li>
					</ul>
				</div>
				<!-- /#sidebar-wrapper -->

				<!-- Page Content -->
				<div id="page-content-wrapper">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><i class="fas fa-exchange-alt"></i> Menu Bar</a>
								<h1 align="center">Workplace</h1>
								<form role="form" action="../controller/AddDepartmentController.php" method="post" >
									
									<div class="form-group">
								
										<label for="dptName">Workplace Name: </label>
										<input type="text" class="form-control" placeholder=" Workplace Name ...." name="dptName" id="dptName" required>
									
									</div>
								
									<button type="submit" name="btnSubmit" class="btn btn-success">Add Workplace</button>
								
								</form>
								<?php
								
									if (isset($_SESSION['msgForDptCreate']))
									{
										if ($_SESSION['msgForDptCreate'] == 1)
										{												
											unset($_SESSION['msgForDptCreate']);
											?>
											<h3 align="center">Workplace Created Successfully</h3>
										
											<div class="table-responsive">
											
												<table class="table table-bordered table-hover table-striped">
												
													<thead>
													
														<tr class="success">
															<th>Serial Number</th>
															<th>Department Name</th>
														</tr>
														
													</thead>
													
													<tbody>
													
														<?php
														$objDepartment = new Department();
														$Desc = "DESC";
														$result = $objDepartment->getAllDpt($Desc);
														while($row = mysqli_fetch_array($result))
														{ 
														?>
															<tr>
																<td><?php echo $row['dptId'] ?></td>
																<td><?php echo $row['dptName'] ?></td>
															</tr>
														<?php
														}
														?>
														
													</tbody>
													
												</table>
												
											</div>	
											
											<?php
										}
										else
										{
											unset($_SESSION['msgForDptCreate']);
											?>
											<?php
										}
									}
									else
									{
										?>
										<?php
									}
									
								?>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /#page-content-wrapper -->

			</div>
			<!-- /#wrapper -->

			<!-- jQuery -->
			<script src="../assets/js/jquery.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

			<!-- Menu Toggle Script -->
			<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			</script>

		</body>

		</html>
<?php

	}
	else
	{
		header("Location:../view/LeaveApplication.php");
	}
	}
	else
	{
		header("Location:../");
	}
?>