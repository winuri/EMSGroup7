<?php 
	include "inc/header.php"; 
	include "classes/Student.php"; 
	$stu = new Student();

	// Function to handle deletion of attendance record
	if(isset($_POST['delete_attendance'])) {
		$attendance_date = $_POST['attendance_date'];
		// Assuming you have a function in your Student class to delete attendance
		$delete_result = $stu->deleteAttendance($attendance_date);
		if($delete_result) {
			$insertattend = "Attendance record for $attendance_date deleted successfully.";
		} else {
			$insertattend = "Error deleting attendance record.";
		}
	}

?>

	<div class="container">
<?php 
	if (isset($insertattend)) {
		echo $insertattend;
	}
?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Employee</a>
					<a class="btn btn-info float-right" href="index.php">Take Attendance</a>
				</h2>
			</div>

			<div class="card-body">
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">NO</th>
							<th width="50%">Attendance Date</th>
							<th width="20%">Action</th>
						</tr>
<?php 
	$getdate = $stu->getDateList();
	if ($getdate) {
		$i = 0;
		while ($value = $getdate->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['att_time']; ?></td>
							<td>
							<a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time']; ?>">View <br>Attendance</a>
							<form action="" method="post" style="display: inline;">
								<input type="hidden" name="attendance_date" value="<?php echo $value['att_time']; ?>">
								<button type="submit" name="delete_attendance" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this attendance record?')">Delete Attendance</button>
							</form>

							
							</td>
							 
						</tr>
<?php } } ?>


					</table>
				</form>
			</div>
		</div>
	</div>


	