<?php
session_start();
require_once "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $score = 0;
    $username = $_SESSION["username"];

    $username_err = $score_err ="";


    if (empty($username_err) && empty($score_err)) {
        $sql = "INSERT INTO leaderboard (username, score) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $param_username, $param_score);

            // Set these parameters
            $param_username = $username;
            $param_score = $_POST["scoreVal"];
            
            

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: leaderboard.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="quiz.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
<div class="quiz">
        <div id="quizWrap"> </div>
    </div>

    <script src="quiz.js"></script>
</body>
</html>



