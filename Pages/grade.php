<?php
session_start();
$name=$_SESSION['uname'];

require '../PHP/connection.php';
$query="SELECT CCode, Name FROM course ORDER BY name";
$resultObjj=$connection->query($query);
$resultObjjj=$connection->query($query);
$role=$_SESSION['Role'];
if($role==1){
    $type='Student';
}
else if($role==2){
    $type='Teacher';
}
else $type='Admin';
$grade=$CC='';
if(isset($_POST['GRADE'])){
$grade=$_SESSION["Grade"];
$CC=   $_SESSION['C'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Grades</title>
        <link rel="stylesheet" href="../style/main.css">
        <link rel="stylesheet" href="../style/account.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../images/website.ico">
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
         <li id="home"><a href="accounts.php">HOME</a></li>
             <li id="course"><a href="material.php">COURSE MATERIALS</a></li>
             <li id="assignment"><a href="assignment.php">ASSIGNMENTS</a></li>
             <li id="grade"><a href="#">GRADE REPORT</a></li>
         </ul>
       </div> 

      


       <!-- Grade for students -->


       <div style="overflow: hidden;" class="cont studentgrade">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 class="title">Grade Report</h1>
        <p>Check your result by choosing the course of your choice below.</p>
        <form action="../PHP/getGrade.php" method="post" name="GRADE">
        <select name="Courses"> 
                    <?php 
                 
                    while($row=$resultObjj->fetch_assoc()) : ?>
                    <option value="<?=$row['CCode']?>"><?=$row['Name']?> </option>
                       <?php endwhile; ?>
                       </select><br>
                       <input class="x" type="submit" name="Go">
                       </form>
                       <div class="card">
        <p class="title2" style="margin_top:0rem;>" ><?php echo $name?> </p>
        <p class="title2">Course Code: <?php echo $CC?></p>
        <p class="title2">Your grade: <?php echo $grade?> </p>
        </div>
       </div>
       

        <!-- Grade for teachers -->


        <div style="overflow: hidden;" class="cont teachergrade">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <form style=" margin-top: 5rem;" action="../PHP/insertGrade.php" method="post">
        <select style="color:#0b3a94;" name="Course"> 
                    <?php
                    while($row=$resultObjjj->fetch_assoc()) : ?>
                    <option value="<?=$row['CCode']?>"><?=$row['Name']?> </option>
                       <?php endwhile; ?>
                       </select><br>
                       <input type="text" name="code" placeholder="Student Code"><br>
                       <input type="text" name="grd" placeholder="Numeric Grade"><br>
                       <input class="x" type="submit" name="Go"><br>
                       </form>
                       <p>To update a student's grade, follow the normal procedure. It will be handled for you automatically.</p>
        
       </div>
       

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>