<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LogStyle.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php
                // Include connection 
                include('ConnectionModel.php');

                // Check if form is submitted
                if(isset($_POST['submit'])){
                    // Retrieve username and password from form
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Check if username and password match admin credentials
                    if($username === 'Admin' && $password === 'Admin123'){
                        // Redirect to admin dashboard
                        header('Location: Home.php');
                        exit();
                    } else {
                        // Display error message if credentials are incorrect
                        echo '<p style="color: red;">Invalid username or password</p>';
                    }
                }
            ?>
        <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
               
            </form>
        </div>
        
      </div>
</body>
</html>