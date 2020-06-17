<?php
session_start();
$name=$_SESSION['uname'];
$role=$_SESSION['Role'];
if($role==1){
    $type='Student';
}
else if($role==2){
    $type='Teacher';
}
else $type='Admin';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../style/main.css">
        <link rel="stylesheet" href="../style/account.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../images/website.ico">
        <style>
            ::placeholder{
                color: #0b3a94;
            }
        </style>
    </head>
    <body>
     
       <div class="sidebar">
           <h1 style="display:none;" class="TYPE"><?php echo $type?></h1>
           <div class="logout">
       <form action="../PHP/logout.php" method="post">
           <input class="x logout" type="submit" name="logout" value="Logout">
       </form>
           </div>
         <ul>
             <li id="home"><a href="Home.php">HOME</a></li>
             <li id="course"><a href="material.php">COURSE MATERIALS</a></li>
             <li id="assignment"><a href="assignment.php">ASSIGNMENTS</a></li>
             <li id="grade"><a href="grade.php">GRADE REPORT</a></li>
             <li id="pass"><a href="#">CHANGE PASSWORD</a></li>
         </ul>
       </div> 

       <div style="overflow: hidden;" class="cont homee">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 style="text-align:center;margin-top:0rem;color:#e5bf3b;font-weight:900;">Password Change</h1>
        <form action="../PHP/changepassword.php" method="post">
    <input type="text" name="old" placeholder="Old Password" required><br>
    <input type="text" name="new" placeholder="New Password" required><br>
    <input class="x" type="submit" name="confirm" value="Confirm">
    </form>
       </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>