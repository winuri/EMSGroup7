<?php
include('ConnectionModel.php');
include('Header.php');
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
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

        //check member number
        $check_stmt = $conn->prepare("SELECT COUNT(*) FROM Employee WHERE Member_No = ?");
        $check_stmt->bind_param("s", $memNo);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count > 0) {
            throw new Exception("Error: Member number already exists.");
        }

        // Insert data into the employee table
        $stmt = $conn->prepare("INSERT INTO Employee (Member_No, F_name, L_name, NIC, Mobile, Gender, Address, DOB, Position_ID, work_ID, Pay_ID, Bank_ID) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssiiii", $memNo, $fname, $lname, $NIC, $telephone, $gender, $address, $dob, $position, $workSelect, $paymethod, $bankSelect);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting employee record: " . $stmt->error);
        }

        $employee_id = $conn->insert_id; // Get the ID of the newly inserted employee

        // Insert data into the accountdetails table
        $stmt2 = $conn->prepare("INSERT INTO AccountDetails (Acc_No, Bank_ID, EMP_ID) VALUES (?, ?, ?)");
        $stmt2->bind_param("sii", $accountNumber, $bankSelect, $employee_id);

        if (!$stmt2->execute()) {
            throw new Exception("Error inserting account details: " . $stmt2->error);
        }

        $success = '<div class="alert alert-success" role="alert">New record created successfully</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    } finally {
        // Close statements
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($stmt2)) {
            $stmt2->close();
        }
    }
}
?>

<section>
    <div class="main">
        <div class="container">  
            <h1 class="head">Add New Employee Details</h1><br><br>
            <?php echo $success; ?>
            <form action="" method="post" onsubmit="return validateForm()">
                <div id="error-container"></div>
                
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Member number:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="memNo" id="memNo" placeholder="111" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Position:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <select class="form-select" id="position" name="position" aria-label="position selection" required>
                            <option value="">Select a position</option>
                            <?php
                            $Positions = mysqli_query($conn, "SELECT * FROM Positions");
                            while ($cc = mysqli_fetch_array($Positions)) {
                                echo "<option value=\"{$cc['Position_ID']}\">{$cc['Position_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Employee Name:<span class="required">*</span></legend>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fname" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Date Of Birth:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="inputDOB" id="inputDOB" placeholder="DD/MM/YYYY" required>
                    </div>
                </div><br><br>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender:<span class="required">*</span></legend>
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
                    <legend class="col-form-label col-sm-2 pt-0">Address:<span class="required">*</span></legend>
                    <div class="col">
                        <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Telephone number:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="inputTPno" id="inputTPno" placeholder="0123456789" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">NIC number:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="NIC" id="NIC" placeholder="686052638V/196860526382" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Account Number:<span class="required">*</span></legend>
                    <div class="col">
                        <input type="text" class="form-control" name="accountNumber" id="accountNumber" placeholder="Account number" aria-label="Account Number" required>
                    </div>
                    <div class="col">
                        <select class="form-select" id="bankSelect" name="bankSelect" aria-label="Bank Selection" required>
                            <option value="">Select a bank</option>
                            <?php
                            $BankDetails = mysqli_query($conn, "SELECT * FROM BankDetails");
                            while ($c = mysqli_fetch_array($BankDetails)) {
                                echo "<option value=\"{$c['Bank_ID']}\">{$c['Bank_Name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Payment Method:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <select class="form-select" id="paymethod" name="paymethod" aria-label="payment selection" required>
                            <option value="">Select a payment method</option>
                            <?php
                            $PayMethod = mysqli_query($conn, "SELECT * FROM PayMethod");
                            while ($cc = mysqli_fetch_array($PayMethod)) {
                                echo "<option value=\"{$cc['Pay_ID']}\">{$cc['Pay_method']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Working Place:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <select class="form-select" id="workSelect" name="workSelect" aria-label="work Selection" required>
                            <option value="">Select a workplace</option>
                            <?php
                            $WorkPlace = mysqli_query($conn, "SELECT * FROM workplace");
                            while ($cc = mysqli_fetch_array($WorkPlace)) {
                                echo "<option value=\"{$cc['work_ID']}\">{$cc['Work_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div><br><br>

                <input class="btn btn-primary" type="submit" value="Submit" style="color:black;">
                <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
            </form>
        </div>
    </div>   
</section>

<style>
    .required {
        color: red;
    }
</style>

<script>
    function validateForm() {
        var fields = [
            "memNo",
            "fname",
            "lname",
            "inputDOB",
            "inputAddress",
            "inputTPno",
            "NIC",
            "accountNumber",
            "position",
            "bankSelect",
            "paymethod",
            "workSelect"
        ];

        var isValid = true;
        var errorMessage = "Please fill in the following required fields:\n";

        fields.forEach(function(field) {
            var element = document.getElementById(field);
            if (element.value === "" || element.value == null) {
                isValid = false;
                errorMessage += "- " + element.getAttribute('placeholder') + "\n";
            }
        });

        var mobileNumber = document.getElementById("inputTPno").value;
        if (!/^\d+$/.test(mobileNumber)) {
            isValid = false;
            errorMessage += "- Mobile number should only contain numbers.\n";
        }

        var accountNumber = document.getElementById("accountNumber").value;
        if (!/^\d+$/.test(accountNumber)) {
            isValid = false;
            errorMessage += "- Account number should only contain numbers.\n";
        }

        var NIC = document.getElementById("NIC").value;
        if (!/^\d{9}(V|\d{3})$/.test(NIC)) {
            isValid = false;
            errorMessage += "- NIC should be either 12 numbers or 9 numbers followed by the letter 'V'.\n";
        }

        if (!isValid) {
            alert(errorMessage);
        }

        return isValid;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="script.js"></script>
