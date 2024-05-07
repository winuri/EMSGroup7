<?php 
	include "inc/header.php"; 
	include "classes/Student.php"; 
	$stu = new Student();
?>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		//$insertdata = $stu->insertStudent($name, $roll);
		 // Check if employee name already exists
		//  if ($stu->isEmployeeNameExists($name)) {
		// 	$insertdata = "<div class='alert alert-danger'><strong>Error !</strong> Employee with the name '$name' already exists!</div>";
		// } else {
			// Check if employee ID already exists
			if ($stu->isEmployeeIdExists($roll)) {
				$insertdata = "<div class='alert alert-danger'><strong>Error !</strong> Employee with the ID '$roll' already exists!</div>";
			} else {
				// Insert the new employee record if name and ID are unique
				$insertdata = $stu->insertStudent($name, $roll);

				//.........
				// Modify the success message here
                if ($insertdata === true) {
                    $insertdata = "<div class='alert alert-success'><strong>Success !</strong> Employee data inserted successfully!</div>";
                }
			}
		}
	
?>

	<div class="container">
<?php
	if (isset($insertdata)) {
		echo $insertdata;
	}
?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Employee</a>
					<a class="btn btn-info float-right" href="index.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Employee Name</label>
						<input type="text" class="form-control" name="name" id="name" required="">
					</div>

					<div class="form-group">
						<label for="roll">Employee ID</label>
						<input type="text" class="form-control" name="roll" id="roll" required="">
					</div>

					<div class="form-group text-center">
						<input type="submit" name="submit" class="btn btn-primary px-5" id="roll" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
