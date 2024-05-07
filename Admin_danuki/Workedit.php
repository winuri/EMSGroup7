<?php
include('ConnectionModel.php');
include('Header.php');
$success='';

$work_ID = isset($_GET['id']) ? $_GET['id'] : null;

if ($work_ID !== null) {
    $query = "SELECT * FROM `workplace` WHERE `work_ID`= '$work_ID'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
       
    }
} else {
    echo "ID is not set.";
}

if(isset($_POST['update'])){
    if(isset($_GET['Newwork_ID'])){
        $Newwork_ID = $_GET['Newwork_ID'];
    }

    $Work_name = $_POST['Work_name'];
    $Work_Address = $_POST['Work_Address'];
    $Owner_name = $_POST['Owner_name'];
    $Owner_mobile = $_POST['Owner_mobile'];

    $query = "UPDATE `workplace` SET `Work_name` = '$Work_name',
    `Work_Address` = '$Work_Address', 
    `Owner_name` = '$Owner_name',
    `Owner_mobile` = '$Owner_mobile'
      WHERE `work_ID`= '$Newwork_ID' ";


    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed".mysqli_error($conn));
    }else{
        header("Location:Workview.php");
        exit(); 
    }


}

?>

                <section>
                    <div class= main>
                        <div class="container">    
                            <h1 class="head">Edit Workplace Details</h1><br><br>

                            <form action="Workedit.php?Newwork_ID=<?php echo $work_ID; ?>" method="post">
                                <input type="hidden" name="work_ID" value="<?php echo $work_ID; ?>">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Name: </legend>
                                    <div class="col">
                                   
                                        <input type="text" class="form-control" name="Work_name" value="<?php echo $row['Work_name']?>">
                                   
                                    </div>
                                </div><br><br>
                                
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Workplace Address: </legend>
                                    <div class="col">
                                       
                                            <input type="text" class="form-control" name="Work_Address" value="<?php echo $row['Work_Address']?>">
                                       
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"> Owner/Supervisor Name: </legend>
                                    <div class="col">
                                        
                                            <input type="text" class="form-control" name="Owner_name" value="<?php echo $row['Owner_name']?>" >
                                          
                                    </div>
                                </div><br><br>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Owner/Supervisor Telephone number:</legend>
                                    <div class="col-auto">
                                        
                                            <input type="text" class="form-control" name="Owner_mobile"  value="<?php echo $row['Owner_mobile']?>">
                                        
                                    </div>
                                </div><br><br>

                                <div>
                                    <button type="submit" class="btn btn-success" name="update" >Update</button>
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
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