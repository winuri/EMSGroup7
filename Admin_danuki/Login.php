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
    <div class="main center-text">
        <h1>Himali Janitorial and Security service Company</h1><br><br>
        <h2>Welcome to Employee Management System</h2>
    </div>
      <div class="container">
        <div class="box form-box">
        
            <?php
            include('ConnectionModel.php');
                // Check if the form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the input values
                    $input_username = $_POST["username"];
                    $input_password = $_POST["password"];

                    // Prepare and bind
                    $stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
                    if ($stmt === false) {
                        die("Prepare failed: " . $conn->error);
                    }

                    $stmt->bind_param("s", $input_username);

                    // Execute the statement
                    if (!$stmt->execute()) {
                        die("Execute failed: " . $stmt->error);
                    }

                    // Bind the result to a variable
                    $stmt->bind_result($stored_password);

                    // Fetch the result
                    if ($stmt->fetch()) {
                        // Check if the provided password matches the stored password
                        if ($input_password == $stored_password) { // For secure passwords, use password_verify
                            // Redirect to home.php upon successful login
                            header("Location: home.php");
                            exit();
                        } else {
                            echo "<p>Incorrect password.</p>";
                        }
                    } else {
                        echo "<p>Username not found.</p>";
                    }

                    // Close the statement
                    $stmt->close();
                }

                // Close the connection
                $conn->close();

            ?>
        <header>Log In</header>
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