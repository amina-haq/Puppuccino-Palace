<?php
// start session
session_start();

// includes database conn 
include './connection.php';

if(isset($_POST['submit'])){// checks if form is submitted

    // username + password from user_form
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);


     // query to check if the username and password match a record in the user_form table
    $query = "SELECT * FROM user_form 
              WHERE name = '$user' and password ='$pass';";

    $result = mysqli_query($conn, $query);// execute onto database 

    $conn->close();// close the database connection

    // If a matching record is found, start a session and redirect to the header page
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $_SESSION["username"] = $user;// store the username in the session

        header('location:header.php');// redirect to the dashboard after logging in
        die();
    }
    else{
        $error[] = 'Invalid Username or Password';// if no match, display error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/web_logo.svg"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <title>Puppuccino Palace</title>
</head>
<body class="login">
    <div class="container">
        <form action="login.php" class="login" method="POST">
            <h2>Puppuccino Palace</h2>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.' </span>';
                }
            }
            ?>
            <div class="login_form">
                <label for="username">Username</label>
                <input type="text" name="user" required>

                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <input type="submit" name="submit" value="Log In" class="btn_login">
        </form>
        <div class="img_box">
            <img src="img/login_dog.png" alt="Dog">
        </div>
    </div>
</body>
</html>
