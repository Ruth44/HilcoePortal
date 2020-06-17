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
        <title>HiLCoE Portal</title>
        <link rel="stylesheet" href="../style/main.css">
        <link rel="stylesheet" href="../style/account.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
     
       <div class="sidebar">
           <h1 style="display:none;" class="TYPE"><?php echo $type?></h1>
         <ul>
             <li id="home">HOME</li>
             <li id="course">COURSE MATERIALS</li>
             <li id="assignment">ASSIGNMENTS</li>
             <li id="grade">GRADE REPORT</li>
         </ul>
       </div> 

       <!-- Homepage for all -->

       <div style="overflow: hidden;" class="cont homee">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 style="text-align:center">Welcome <?php echo $name?></h1>
       </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>