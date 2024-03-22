<?php include("../model/UserModel.php"); 
	
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

			<title>User profile</title>

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
			
			<script language=JavaScript>
				
				function reload(form)
					{
						var val=form.cat.options[form.cat.options.selectedIndex].value;
						self.location='ListDesignation.php?cat=' + val ;
					}
					
			</script>

		</head>

		<body>

			<div id="wrapper">

				<!-- Sidebar -->
				<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
					<h2 style="color:white">Admin Dashboard</h2>
					
					
						<li>
							<a href="UserProfile.php" style="color:#DAA520;"><i class="fas fa-user-circle"></i> User Profile</a>
						</li>
							<?php
							$objLeaveApplication = new User();
							$result = $objLeaveApplication->getForRecomandationNumber();
							while($row = mysqli_fetch_array($result))
							{ 
							?>
				
							<?php
							}
							$objLeaveApplication = new User();
							$result = $objLeaveApplication->getRecomandationNumber();
							while($row = mysqli_fetch_array($result))
							{ 
							?>
					
							<?php
							}
							?>
						<li>
							<a href="AddDepartment.php"><i class="fas fa-plus"></i> Add  Workplace</a>
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
							<a href="UsersLeaveDetails.php"><i class="fas fa-clipboard-list"></i> Employee's Leave Details</a>
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
								<h1 align="center">User Profile</h1>
								<hr>
								
								<form class="form-group" role="form" action="../controller/UserController.php" method="post">
									
									
									
									<div class="table-responsive">
									
										<table class="table table-bordered table-hover table-striped">
										
											
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												<tr>
													<td>Leave Requested For</td>
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												<tr>
													<td>Leave Balance</td>
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												
											</tbody>
											
										</table>
										-->
										
									</div>
								
								</form>
								
								<form class="col-md-6 form-horizontal" role="form" action="" method="" >
									
									<?php
									$objUser = new User();
									$resultForUser = $objUser->getUserInformation();
									while($rowForUser = mysqli_fetch_array($resultForUser))
									{
									?>
									
									<div class="form-group col-md-12">
									
										<label class="col-sm-6 control-label" for="userName">User Name: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eFirstName']." ".$rowForUser['eLastName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userOfficeCode">User ID: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eEmployeeCodeNumber']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDpt">User Workplace: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['dptName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDesi">User Designation: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['desiDesignationName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDoB">User DoB: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eDateOfBirth']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userGender">User Gender: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eGender']; ?></p>
										</div>
										
							
										
										<label class="col-sm-6 control-label" for="userEmail">User Email Address: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eEmailAddress']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userOfficePhoneNumber"> Phone Number: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['ePhoneNumberPersonal']; ?></p>
										</div>
									
										<label class="col-sm-6 control-label" for="userPermanentAddress">User Address: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eParmanentAddress']; ?></p>
										</div>

									</div>
									
									<?php
									}
									?>
									
								</form>
								
								<form class="col-md-6 form-horizontal" role="form" action="../controller/UserController.php" method="post">
									
									<?php
										
										if(isset($_SESSION['UserInfoUpdated']))
										{
											if($_SESSION['UserInfoUpdated'] == 1)
											{
												UNSET($_SESSION['UserInfoUpdated']);
												
												$objUser = new User();
												$resultForUser = $objUser->getUserInformation();
												while($rowForUser = mysqli_fetch_array($resultForUser))
												{
												?>
												
												<h3 style="color:green" align="center">Successfully Updated</h3>
									
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
													<div class="col-sm-6">
														<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
													</div>
													
												</div>
												
												<?php
												}
												?>
												
												<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
												<?php
											}
											else
											{
												UNSET($_SESSION['UserInfoUpdated']);
												
												$objUser = new User();
												$resultForUser = $objUser->getUserInformation();
												while($rowForUser = mysqli_fetch_array($resultForUser))
												{
												?>
												
												<h4 style="color:red" align="center">Update Not Successfull, Please Try Again</h4>
									
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
													<div class="col-sm-6">
														<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
													</div>
													
												</div>
												
												<?php
												}
												?>
												
												<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
												<?php
											}
										}
										else
										{
											$objUser = new User();
											$resultForUser = $objUser->getUserInformation();
											while($rowForUser = mysqli_fetch_array($resultForUser))
											{
											?>
												
											<h3 align="center">Update Your Current Information</h3>
								
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
												<div class="col-sm-6">
													<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
												</div>
												
											</div>
											
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
												<div class="col-sm-6">
													<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
												</div>
												
											</div>
											
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
												<div class="col-sm-6">
													<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
												</div>
												
											</div>
											
											<?php
											}
											?>
											
											<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
											<?php
										}
										
									?>
									
								</form>
								
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
		?>
		
		<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Online Leave Application</title>

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
			
			<script language=JavaScript>
				
				function reload(form)
					{
						var val=form.cat.options[form.cat.options.selectedIndex].value;
						self.location='ListDesignation.php?cat=' + val ;
					}
					
			</script>

		</head>

		<body>

			<div id="wrapper">

				<!-- Sidebar -->
				<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
						<li class="sidebar-brand">
							<a href="LeaveApplication.php">Online Leave Application</a>
						</li>
						<li>
							<a href="LeaveApplication.php"><i class="fas fa-file-signature"></i> Apply Leave</a>
						</li>
						<li>
							<a href="UserProfile.php" style="color:#DAA520;"><i class="fas fa-user-circle"></i> User Profile</a>
						</li>
						<li>
							<a href="ListOfUserBlood.php"><i class="fas fa-heartbeat"></i> Blood Group</a>
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
								<h1 align="center">User Profile</h1>
								
								<form class="form-group" role="form" action="../controller/UserController.php" method="post">
									
									<?php
									$objLeaveApplication = new User();
									$livHistory = $objLeaveApplication->getAllleaveHistory();
									while($historyForLeave = mysqli_fetch_array($livHistory))
									{
										echo "<br/><span style='color:#DAA520;' class='glyphicon glyphicon-road'></span> You were in Leave from <b style='color:#DAA520;'>".$historyForLeave['lLeaveFromDate']."</b> To <b style='color:#DAA520;'>".$historyForLeave['lLeaveToDate']."</b>. Total <b style='color:#DAA520;'>".$historyForLeave['lTotalLeaveDays']."</b> Days.<br/>";
									}
									?>
									
									<div class="table-responsive">
									
										<table class="table table-bordered table-hover table-striped">
										
											<thead>
											
												<tr class="success">
													<th>Leave Name</th>
													<th>CL</th>
													<th>SL</th>
													<th>EL</th>
													<th>ML</th>
													<th>PL</th>
													<th>BL</th>
													<th>SL</th>
													<th>UL</th>
													<th>Total</th>
												</tr>
												
											</thead>
											
											<tbody>
												
												<tr>
													<td>Leave Due</td>
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												<tr>
													<td>Leave Requested For</td>
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveRequest($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												<tr>
													<td>Leave Balance</td>
													<?php
													$livLeaveIdForCl = 1;
													$objLeaveApplication = new User();
													$result1 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result1; ?></td>
													<?php
													$livLeaveIdForCl = 2;
													$objLeaveApplication = new User();
													$result2 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result2; ?></td>
													<?php
													$livLeaveIdForCl = 3;
													$objLeaveApplication = new User();
													$result3 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result3; ?></td>
													<?php
													$livLeaveIdForCl = 4;
													$objLeaveApplication = new User();
													$result4 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result4; ?></td>
													<?php
													$livLeaveIdForCl = 5;
													$objLeaveApplication = new User();
													$result5 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result5; ?></td>
													<?php
													$livLeaveIdForCl = 6;
													$objLeaveApplication = new User();
													$result6 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result6; ?></td>
													<?php
													$livLeaveIdForCl = 7;
													$objLeaveApplication = new User();
													$result7 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result7; ?></td>
													<?php
													$livLeaveIdForCl = 8;
													$objLeaveApplication = new User();
													$result8 = $objLeaveApplication->leaveDue($livLeaveIdForCl);
													?>
													<td><?php echo $result8; ?></td>


													<td><?php echo $result1+$result2+$result3+$result4+$result5+$result6+$result7+$result8; ?></td>
												</tr>
												
											</tbody>
											
										</table>
										
									</div>
								
								</form>
								
								<form class="col-md-6 form-horizontal" role="form" action="" method="" >
									
									<?php
									$objUser = new User();
									$resultForUser = $objUser->getUserInformation();
									while($rowForUser = mysqli_fetch_array($resultForUser))
									{
									?>
									
									<div class="form-group col-md-12">
									
										<label class="col-sm-6 control-label" for="userName">User Name: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eFirstName']." ".$rowForUser['eLastName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userOfficeCode">User Office Code: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eEmployeeCodeNumber']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDpt">User Department: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['dptName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDesi">User Designation: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['desiDesignationName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userDoB">User DoB: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eDateOfBirth']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userGender">User Gender: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eGender']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userBlood">User Blood Group: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['bName']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userEmail">User Email Address: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eEmailAddress']; ?></p>
										</div>
										
										<label class="col-sm-6 control-label" for="userOfficePhoneNumber">User Office Phone Number: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['ePhoneNumberOffice']; ?></p>
										</div>
									
										<label class="col-sm-6 control-label" for="userPermanentAddress">User Permanent Address: </label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $rowForUser['eParmanentAddress']; ?></p>
										</div>

									</div>
									
									<?php
									}
									?>
									
								</form>
								
								<form class="col-md-6 form-horizontal" role="form" action="../controller/UserController.php" method="post">
									
									<?php
										
										if(isset($_SESSION['UserInfoUpdated']))
										{
											if($_SESSION['UserInfoUpdated'] == 1)
											{
												UNSET($_SESSION['UserInfoUpdated']);
												
												$objUser = new User();
												$resultForUser = $objUser->getUserInformation();
												while($rowForUser = mysqli_fetch_array($resultForUser))
												{
												?>
												
												<h3 style="color:green" align="center">Successfully Updated</h3>
									
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
													<div class="col-sm-6">
														<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
													</div>
													
												</div>
												
												<?php
												}
												?>
												
												<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
												<?php
											}
											else
											{
												UNSET($_SESSION['UserInfoUpdated']);
												
												$objUser = new User();
												$resultForUser = $objUser->getUserInformation();
												while($rowForUser = mysqli_fetch_array($resultForUser))
												{
												?>
												
												<h4 style="color:red" align="center">Update Not Successfull, Please Try Again</h4>
									
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
													<div class="col-sm-6">
														<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
													</div>
													
												</div>
												
												<div class="form-group">
											
													<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
													<div class="col-sm-6">
														<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
													</div>
													
												</div>
												
												<?php
												}
												?>
												
												<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
												<?php
											}
										}
										else
										{
											$objUser = new User();
											$resultForUser = $objUser->getUserInformation();
											while($rowForUser = mysqli_fetch_array($resultForUser))
											{
											?>
												
											<h3 align="center">Update Your Current Information</h3>
								
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPersonalPhoneNumber">User Personal Phone Number: </label>
												<div class="col-sm-6">
													<input type="text" class="form-control" value="<?php echo $rowForUser['ePhoneNumberPersonal']; ?>" name="userPersonalPhoneNumber" id="userPersonalPhoneNumber" required>
												</div>
												
											</div>
											
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPresentAddress">User Present Address: </label>
												<div class="col-sm-6">
													<input type="text" class="form-control" value="<?php echo $rowForUser['ePresentAddress']; ?>" name="userPresentAddress" id="userPresentAddress" required>
												</div>
												
											</div>
											
											<div class="form-group">
										
												<label class="col-sm-6 control-label" for="userPassword">User Password: </label>
												<div class="col-sm-6">
													<input type="password" class="form-control" value="<?php echo $rowForUser['ePassword']; ?>" name="userPassword" id="userPassword" required>
												</div>
												
											</div>
											
											<?php
											}
											?>
											
											<h3 align="center"><button type="submit" name="btnUserInfoUpdate" class="btn btn-success">Update</button></h3>
											<?php
										}
										
									?>
									
								</form>
								
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
	}
	else
	{
		header("Location:../");
	}
?>