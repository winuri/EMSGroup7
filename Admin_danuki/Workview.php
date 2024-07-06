<?php
include('ConnectionModel.php');
include('Header.php');
?>

<section>
    <div class="main">
        <div class="container">   
            <?php
                if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-warning alert-dismissible fade show" 
                    role="alert"> 
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" 
                    aria-label="Close"></button>
                    </div>';
                } 
            ?>
            <h1 class="head">View Workplace Details</h1><br><br>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Work_ID</th>
                        <th scope="col">Work_Address</th>
                        <th scope="col">Work_name</th>
                        <th scope="col">No_of_workers</th>
                        <th scope="col">Person_in_charge_name</th>
                        <th scope="col">Person_in_charge_telephone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Fetch workplace details from database based on the selected ID
                        $query = "SELECT * FROM WorkPlace";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        // Display fetched data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr> 
                                <td><?php echo $row['work_ID']?></td>
                                <td><?php echo $row['Work_Address']?></td>
                                <td><?php echo $row['Work_name']?></td>
                                <td><?php echo $row['No_of_workers']?></td>
                                <td><?php echo $row['Person_in_charge_name']?></td>
                                <td><?php echo $row['Person_in_charge_telephone']?></td>
                                <td>
                                    <a href="Workedit.php?id=<?php echo $row['work_ID'] ?>" class="link-dark">
                                    <i class="fas fa-edit fs-5 me-3"></i></a>
                                    <a href="Workdelete.php?id=<?php echo $row['work_ID'] ?>" class="link-dark">
                                    <i class="fas fa-trash fs-5"></i></a>
                                </td>
                            </tr>
                            <?php    
                        }
                    ?>
                </tbody> 
            </table>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="script.js"></script>
