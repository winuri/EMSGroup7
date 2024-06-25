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
            <h1 class="head">View Salary Details</h1><br><br>

        
           
        </div>
    </div>
</section>

          
                
                

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="script.js"></script>
                