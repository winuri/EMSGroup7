<?php
include('ConnectionModel.php');
include('Header.php');
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Fetch data from the form
        $Work_name = $_POST['Work_name'];
        $Work_Address = $_POST['Work_Address'];
        $Owner_name = $_POST['Owner_name'];
        $Owner_mobile = $_POST['Owner_mobile'];

        // Insert data into the Workplace table
        $stmt = $conn->prepare("INSERT INTO workplace (Work_Address, Work_name, Owner_name, Owner_mobile)
                                VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Work_Address, $Work_name, $Owner_name, $Owner_mobile);

        if ($stmt->execute()) {
            $success = '<div class="alert alert-success" role="alert">New record created successfully</div>';
        } else {
            throw new Exception("Error: " . $stmt->error);
        }
    } catch (Exception $e) {
        $success = '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    } finally {
        // Close statement
        if (isset($stmt)) {
            $stmt->close();
        }
    }
}
?>
<section>
    <div class="main">
        <div class="container">    
            <h1 class="head">Add Workplace Details</h1><br><br>
            <?php echo $success; ?>
            <form action="" method="post" id="workplace-form">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Name: <span class="required">*</span> </legend>
                    <div class="col">
                        <input type="text" class="form-control" name="Work_name" id="Work_name" placeholder="Telecom-Mannar" required>
                    </div>
                </div><br><br>
                
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Address:<span class="required">*</span> </legend>
                    <div class="col">
                        <input type="text" class="form-control" name="Work_Address" id="Work_Address" placeholder="1234 Main St" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0"> Owner/Supervisor Name: <span class="required">*</span></legend>
                    <div class="col">
                        <input type="text" class="form-control" name="Owner_name" id="Owner_name" placeholder="" required>
                    </div>
                </div><br><br>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Owner/Supervisor Telephone number:<span class="required">*</span></legend>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="Owner_mobile" id="Owner_mobile" placeholder="0123456789" required>
                        <span id="error-owner-mobile" class="text-danger"></span>
                    </div>
                </div><br><br>

                <input class="btn btn-primary" type="submit" value="Submit" style="color:black;">
                <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
            </form>
            <div id="error-container"></div>
        </div>
    </div>
</section>
<style>
    .required {
        color: red;
    }
</style>

<script>
document.getElementById('workplace-form').addEventListener('submit', function(event) {
    let errors = [];

    // Validate Owner/Supervisor Telephone number
    let ownerMobile = document.getElementById('Owner_mobile').value.trim();
    if (ownerMobile === '') {
        errors.push('Owner/Supervisor Telephone number is required');
        document.getElementById('error-owner-mobile').textContent = 'Owner/Supervisor Telephone number is required';
    } else if (!/^\d{10}$/.test(ownerMobile)) {
        errors.push('Owner/Supervisor Telephone number should be 10 digits');
        document.getElementById('error-owner-mobile').textContent = 'Owner/Supervisor Telephone number should be 10 digits';
    } else {
        document.getElementById('error-owner-mobile').textContent = '';
    }

    if (errors.length > 0) {
        document.getElementById('error-container').innerHTML = '<div class="alert alert-danger" role="alert">' + errors.join('<br>') + '</div>';
        event.preventDefault(); // Prevent form submission if there are errors
    } else {
        document.getElementById('error-container').innerHTML = '';
    }
});
</script>      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="script.js"></script>
