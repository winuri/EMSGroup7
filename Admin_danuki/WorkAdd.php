<?php
include('ConnectionModel.php');
include('Header.php');
$success='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $workName = $_POST['workName'];
    $workAddress = $_POST['workAddress'];
    $OwnerName = $_POST['OwnerName'];
    $OwnerTPno = $_POST['OwnerTPno'];

    // Insert data into the Workplace table
    $stmt = $conn->prepare("INSERT INTO workplace(Address,name,Owner_name,Owner_mobile)
                            VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$workAddress,$workName,$OwnerName,$OwnerTPno);

    if($stmt->execute()){
        $success= '<div class="alert alert-success" role="alert">New record created successfully</div>';
    } else {
        $success = '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
    }

    // Close statement
    $stmt->close();
}
?>
                <section>
                    <div class= main>
                        <div class="container">    
                            <h1 class="head">Add Workplace Details</h1><br><br>

                            <form action="" method="post">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Name: </legend>
                                    <div class="col">
                                        <input type="text" class="form-control" name="workName" id="workName" placeholder="Telecom-Mannar">
                                    </div>
                                </div><br><br>
                                
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Address: </legend>
                                    <div class="col">
                                        <input type="text" class="form-control" name="workAddress" id="workAddress" placeholder="1234 Main St">
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Owner/Supervisor Name: </legend>
                                    <div class="col">
                                        <input type="text" class="form-control" name="OwnerName" id="OwnerName" placeholder="">
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Owner/Supervisor Telephone number:</legend>
                                    <div class="col-auto">
                                        <input type="text" class="form-control" name="OwnerTPno" id="OwnerTPno" placeholder="0123456789">
                                    </div>
                                </div><br><br>

                                <input class="btn btn-primary" type="submit" value="Submit" style="color:black;">
                                <input class="btn btn-primary" type="reset" value="Reset" style="color:black;">
                            </form>
                        </div>
                    </div>
                </section>    


            </div> 
        </div>
            
                
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
                

    
</body>
</html>