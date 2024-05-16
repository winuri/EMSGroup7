<?php
include('ConnectionModel.php');
include('Header.php');
?>

<section>
    <div class= main>
        <div class="container">   
            <?php
                if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-warning alert-dismissible fade show" 
                    role="alert"> 
                    '.$msg.'
                    <button type="button class="btn-close" data-bs-dismiss="alert" 
                    aria-label="Close"</button>
                    </div>';
                } 
            ?>
            <h1 class="head">View Inventory Details</h1><br><br>

        
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Tool_ID</th>
                        <th scope="col">Tool_name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">purchase_date</th>
                    </tr><br>
                </thead>
                <tbody>

                    <?php
                    
                    
                        // Fetch workplace details from database based on the selected ID
                        $query = "SELECT * FROM inventory";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    
                        // Display fetched data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr> 
                                <td><?php echo $row['Tool_ID']?></td>
                                <td><?php echo $row['Tool_name']?></td>
                                <td><?php echo $row['Price']?></td>
                                <td><?php echo $row['Quantity']?></td>
                                <td><?php echo $row['purchase_date']?></td>
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
        
