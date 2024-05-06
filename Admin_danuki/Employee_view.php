<?php
include('ConnectionModel.php');
include('Header.php');
$success = '';

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>


                <section>
                    <div class= main>
                        <div class="scroll-container">     
                            <h1 class="head">View Employee details</h1><br><br>
                           
                            
                                    <table class="table table-hover text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Member_No</th>
                                                <th scope="col">F_name</th>
                                                <th scope="col">L_name</th>
                                                <th scope="col">DOB</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">NIC</th>
                                                <th scope="col">Position_name</th>
                                                <th scope="col">Work_name</th>
                                                <th scope="col">Pay_method</th>
                                                <th scope="col">Acc_No</th>
                                                <th scope="col">Bank_Name</th>
                                                <th scope="col">Action</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Fetch Employee details from tables Employee, Accountdetails, bankdetails, positions, paymentmethod and workplace
                                                $sql = "SELECT e.Member_No, e.F_name, e.L_name, e.DOB, e.Gender, e.Address, e.Mobile, e.NIC,
                                                p.Position_name, w.Work_name, pay.Pay_method, ad.Acc_No, bd.Bank_Name, e.EMP_ID
                                                FROM employee AS e
                                                LEFT JOIN accountdetails AS ad ON e.EMP_ID = ad.EMP_ID
                                                LEFT JOIN bankdetails AS bd ON ad.Bank_ID = bd.Bank_ID
                                                LEFT JOIN positions AS p ON e.Position_ID = p.Position_ID
                                                LEFT JOIN paymethod AS pay ON e.Pay_ID = pay.Pay_ID
                                                LEFT JOIN workplace AS w ON e.work_ID = w.work_ID";
                                        


                                                $result = mysqli_query($conn,$sql);
                                                if(!$result){
                                                    die("Query failed: ".mysqli_error($conn));
                                                    
                                                }

                                                //Display fetched data
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['Member_No']?></td>
                                                        <td><?php echo $row['F_name']?></td>
                                                        <td><?php echo $row['L_name']?></td>
                                                        <td><?php echo $row['DOB']?></td>
                                                        <td><?php echo $row['Gender']?></td>
                                                        <td><?php echo $row['Address']?></td>
                                                        <td><?php echo $row['Mobile']?></td>
                                                        <td><?php echo $row['NIC']?></td>
                                                        <td><?php echo $row['Position_name']?></td>
                                                        <td><?php echo $row['Work_name']?></td>
                                                        <td><?php echo $row['Pay_method']?></td>
                                                        <td><?php echo $row['Acc_No']?></td>
                                                        <td><?php echo $row['Bank_Name']?></td>
                                                        <td>
                                                            <a href="Employee_edit.php?id=<?php echo $row['EMP_ID'] ?>" class="link-dark">
                                                            <i class="fas fa-edit fs-5 me-3"></i></a>
                                                            <a href="Employee_delete.php?id=<?php echo $row['EMP_ID'] ?>" class="link-dark">
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
                
