<?php
require_once "config.php";
$sql = "SELECT * FROM leaderboard";
$result=mysqli_query($conn,$sql)
?>
<?php ?>
    <html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="quiz.css?v=<?php echo time();?>">
    <head><title>View</title></head>
    <body>
    <div class="nav-bar">
    <a href="../registration/welcome.php"> <img src="logo.jpg" height="80px" alt="" class="logo"></a>
        <ul class="nav-links">
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="../registration/logout.php">Logout</a></li>
        </ul>
    </div>
    
    
    </form>
    <table class="table table-striped table-light">
        <tr>
            <th class="viewText" scope="col">Id</th>
           
            <th class="viewText" scope="col">Username</th>
           
            <th class="viewText" scope="col">Score</th>
      
        </tr>
        <?php foreach ($result as $row){ ?>
            <tr>
                <td scope="row"><?php echo$row['id']?></td>
              
                <td class="viewText"><?php echo $row['username']?></td>
                <td class="viewText"><?php echo $row['score']?></td>
               
                
              
            </tr>

        <?php } ?>
    </table>
    </body>
    </html>
<?php ?>