<?php
include('ConnectionModel.php');
include('Header.php');
$success = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $memNo = $_POST['memNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = date('Y-m-d', strtotime($_POST['inputDOB']));
    $gender = $_POST['gridRadios'];
    $address = $_POST['inputAddress'];
    $telephone = $_POST['inputTPno'];
    $NIC = $_POST['NIC'];
    $accountNumber = $_POST['accountNumber'];
    $bankSelect = $_POST['bankSelect'];
    $position = $_POST['position'];
    $paymethod = $_POST['paymethod'];
    $workSelect = $_POST['workSelect'];

    // Insert data into the employee table
    $stmt = $conn->prepare("INSERT INTO Employee (Member_No, F_name, L_name, NIC , Mobile, Gender,Address, DOB,Position_ID, work_ID, Pay_ID,Bank_ID) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssiiii", $memNo, $fname, $lname, $NIC , $telephone, $gender,$address, $dob, $position, $workSelect, $paymethod, $bankSelect);

    if ($stmt->execute()) {
        $employee_id = $conn->insert_id; // Get the ID of the newly inserted employee

        // Insert data into the accountdetails table
        $stmt2 = $conn->prepare("INSERT INTO AccountDetails (Acc_No, Bank_ID,EMP_ID) VALUES (?, ?, ?)");
        $stmt2->bind_param("sii",  $accountNumber, $bankSelect, $employee_id);
        $stmt2->execute();

        $success = '<div class="alert alert-success" role="alert">New record created successfully</div>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

?>

                <section>
                     <h1 class="head">Add New Employee Details</h1><br><br>
                    <form action="" method="post">

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Member number:</legend>
                            <div class="col-auto">
                            <input type="text" class="form-control" name="memNo" id="memNo" placeholder="111">
                            </div>
                        </div><br><br>

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Position:</legend>
                            <div class="col-auto">
                                <select class="form-select" id="position" name="position" aria-label="position selection" >
                                    <?php
                                    $Positions = mysqli_query($conn,"Select * from Positions");
                                    while($cc = mysqli_fetch_array($Positions)){
                                    ?>
                                    <option value="<?php echo $cc['Position_ID'] ?>"><?php echo $cc['Position_name']?></option>    
                                <?php }?>

                                    ?>

                                </select>
                            </div>
                        </div><br><br>
        
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Employee Name:</legend>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fname" >
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" >
                            </div>
                        </div><br><br>

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Date Of Birth:</legend>
                            <div class="col-auto">
                            <input type="date" class="form-control" posiname="inputDOB" name="inputDOB" id="inputDOB" placeholder="DD/MM/YYYY">
                            </div>
                        </div><br><br>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked >
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
                            <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="1234 Main St">
                            </div>
                        </div><br><br>

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Telephone number:</legend>
                            <div class="col-auto">
                            <input type="text" class="form-control" name="inputTPno" id="inputTPno" placeholder="0123456789">
                            </div>
                        </div><br><br>


                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">NIC number:</legend>
                            <div class="col-auto">
                            <input type="text" class="form-control" name="NIC" placeholder="12345678V / 74125896352" >
                            </div>
                        </div><br><br>

                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Account Number:</legend>
                            <div class="col">
                                <input type="text" class="form-control" name="accountNumber" placeholder="Account number" aria-label="Account Number">
                            </div>
                            <div class="col">
                                <select class="form-select" id="bankSelect" name="bankSelect" aria-label="Bank Selection">

                                <?php
                                $BankDetails = mysqli_query($conn," Select * from BankDetails");
                                while($c = mysqli_fetch_array($BankDetails)){
                                ?>
                                <option value="<?php echo $c['Bank_ID'] ?>"><?php echo $c['Bank_Name']?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div><br><br>

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Payment Method:</legend>
                            <div class="col-auto">
                                <select class="form-select" id="paymethod" name="paymethod" aria-label="payment selection" >
                                    <?php
                                    $PayMethod = mysqli_query($conn,"Select * from PayMethod");
                                    while($cc = mysqli_fetch_array($PayMethod)){
                                    ?>
                                    <option value="<?php echo $cc['Pay_ID'] ?>"><?php echo $cc['Pay_method']?></option>    
                                <?php }?>

                                    ?>

                                </select>
                            </div>
                        </div><br><br>

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Working Place:</legend>
                            <div class="col-auto">
                                <select class="form-select" id="workSelect" name="workSelect" aria-label="work Selection" >
                                    <?php
                                    $WorkPlace = mysqli_query($conn,"Select * from WorkPlace");
                                    while($cc = mysqli_fetch_array($WorkPlace)){
                                    ?>
                                    <option value="<?php echo $cc['work_ID'] ?>"><?php echo $cc['Work_name']?></option>    
                                <?php }?>

                                </select>
                            </div>
                        </div><br><br>
                    
                        <input class="btn btn-primary" type="submit" value="Submit" style="color:black;">
                        <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
                    </form>
                </section>
            </div> 
        </div>
            
                
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
                

   
</body>
</html>