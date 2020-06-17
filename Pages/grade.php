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

$grade=$_SESSION["Grade"];

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

      


       <!-- Grade for students -->


       <div style="overflow: hidden;" class="cont studentgrade">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <form action="../PHP/getGrade.php" method="post">
        <select name="Courses"> 
                    <?php 
                 
                    while($row=$resultObjj->fetch_assoc()) : ?>
                    <option value="<?=$row['CCode']?>"><?=$row['Name']?> </option>
                       <?php endwhile; ?>
                       </select><br>
                       <input class="x" type="submit" name="Go">
                       </form>
                       <div class="card">
        <h1><?php echo $name?> </h1>
        <h1>Your grade: <?php echo $grade?> </h1>
        </div>
       </div>
       

        <!-- Grade for teachers -->


        <div style="overflow: hidden;" class="cont teachergrade">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <form style=" margin-top: 5rem;" action="../PHP/insertGrade.php" method="post">
        <select name="Course"> 
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