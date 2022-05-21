<?php
//This script will handle login
session_start();
if(isset($_SESSION['username']))
{
    header("location:welcome.Php");
    exit;
}
require_once "config.php";
$username = $password = "";
$err = "";
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username and password";
        echo $err;
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if(empty($err))
    {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

// Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt))
                {
                    if(password_verify($password, $hashed_password))
                    {
// this means the password is correct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

//Redirect user to welcome page
                        header("location:welcome.php");

                    }
                }

            }

        }
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Register | PratQuiz</title>
</head>
<body>
<div class="nav-bar">
   <a href="../index.php"> <img src="logo.jpg" height="80px" alt="" class="logo"></a>

        <ul class="nav-links">
            <li> <a href="../index.php"> Home </a></li>
            <li> <a href="register.php"> Register </a></li>


        </ul>


    </div>







    <hr>
    
    <form action="login.php"  class="log-form" method="post">
        <label for="name">Username:</label>
        <input type="text" name="username" id="email" placeholder="Enter Username"> <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter Password"> <br>
        <button type="submit" >Submit</button>
    </form>


</body>
</html>