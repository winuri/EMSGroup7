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
                            <h1 class="head">View Workplace Details</h1><br><br>

                        
                            <table class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Work_ID</th>
                                        <th scope="col">Work_Address</th>
                                        <th scope="col">Work_name</th>
                                        <th scope="col">Owner_name</th>
                                        <th scope="col">Owner_mobile</th>
                                        <th scope="col">Action</th>
                                    </tr><br>
                                </thead>
                                <tbody>

                                    <?php
                                   
                                    
                                        // Fetch workplace details from database based on the selected ID
                                        $query = "SELECT * FROM WorkPlace";
                                        $result = mysqli_query($conn, $query);
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
                                                <td><?php echo $row['Owner_name']?></td>
                                                <td><?php echo $row['Owner_mobile']?></td>
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

            </div> 
        </div>
            
                
                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
                

    
</body>
</html>


*
// Fetching data based on selected workplace
if(isset($_POST['workSelect'])){
    $workSelect = $_POST['workSelect'];

    // Perform SQL query to fetch employee details based on selectedWork
    $sql = "SELECT e.Member_No, e.F_name, e.L_name, e.DOB, e.Gender, e.Address, e.Mobile, e.NIC,
            ad.Acc_No, bd.Bank_Name, p.Position_name, pay.Pay_name
            FROM employee AS e
            JOIN accountdetails AS ad ON e.EMP_ID = ad.EMP_ID
            JOIN bankdetails AS bd ON ad.bank_id = bd.bank_id
            JOIN positions AS p ON e.Position_ID = p.Position_ID
            JOIN paymethod AS pay ON e.Pay_ID = pay.Pay_ID
            JOIN workplace AS w ON e.work_ID = w.work_ID
            WHERE w.name = ?";
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $bindResult = $stmt->bind_param("s", $workSelect);
    if ($bindResult === false) {
        die("Error binding parameters: " . $stmt->error);
    }
    
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Build the HTML for the table of employee data
    $output = '';
    if($result->num_rows > 0){
        $output .= "<table>";
        $output .= "<tr><th>Member no</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Position</th><th>Gender</th><th>Address</th>
        <th>Telephone Number</th><th>NIC Number</th><th>Account Number</th><th>Bank</th><th>Payment Method</th></tr>";
        while($row = $result->fetch_assoc()){
            $output .= "<tr><td>".$row['Member_No']."</td><td>".$row['F_name']."</td><td>".$row['L_name']."</td><td>".$row['DOB']."</td><td>"
            .$row['Position_name']."</td><td>".$row['Gender']."</td><td>".$row['Address']."</td><td>".$row['Mobile']."</td><td>".$row['NIC']."</td><td>"
            .$row['Acc_No']."</td><td>".$row['Bank_Name']."</td><td>".$row['Pay_name']."</td></tr>";
        }
        $output .= "</table>";
    } else {
        $output .= "No results found";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Output the table of employee data
    echo $output;
    exit; // Terminate the script after outputting the table
}
*/