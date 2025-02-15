<?php
 
include './connection.php';

if(isset($_POST['submit'])){ // checking if form is submitted

    $user =mysqli_real_escape_string($conn, $_POST['user']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $re_pass = mysqli_real_escape_string($conn, $_POST['re_password']);

    // checks if the username and password already exist in the database
    $query = "SELECT * FROM user_form WHERE name = '$user' and password ='$pass'";

    // execute the query
    $result = mysqli_query($conn, $query);

    // user already exists, display an error message
    if(mysqli_num_rows($result)>0){
        $error[] = 'User Already Exists';

    }
    else{
        // checking if the password and confirm password fields match
        if($pass !=$re_pass){
            $error[] = 'Password Does Not Match'; // error if passwords don't match
        }
        else{
            // If all checks pass, insert the new user into the database
            $insert = "INSERT INTO user_form(name, email, password) VALUES('$user', '$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
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
<body class="register">
    <form action="register.php" class="register" method="POST">
        <h1>Create Account</h1>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.' </span>';
            }
        }
        ?>
        <div class="register_form">
            <label for="name">Name</label>
            <input type="text" name="name" required><br>                
        
            <label for="username">Username</label>
            <input type="text" name="user" required><br>

            <label for="email">Email</label>               
            <input type="email" name="email" required><br>
        
            <label for="password">Password</label>               
            <input type="password" name="password" required><br>

            <label for="password">Re-enter Password</label>              
            <input type="password" name="re_password" required><br>
        </div>
        
            <p>Already have an account? <a href="login.php">Log In</a></p>
            <input type="submit" name="submit" value="Sign Up" class="btn_register">
    
    </form>
</body>
</html>