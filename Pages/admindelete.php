<?php
session_start();
$name=$_SESSION['uname'];

require '../PHP/connection.php';
$query="SELECT StudentCode, FullName FROM student ORDER BY FullName";
$query2="SELECT TeaCode, FullName FROM teacher ORDER BY FullName";
$resultObj=$connection->query($query);
$resultObj2=$connection->query($query2);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>HiLCoE Portal</title>
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
         <li id="report"><a href="admindash.php">REPORTS</a></li>
         <li id="upload"><a href="newsupload.php">UPLOAD NEWS</a></li>
         <li id="delete"><a href="#">DELETE USERS</a></li>
             
         </ul>
       </div> 
       <div style="overflow:hidden;width:64rem;" class="cont dash">
       <h1 style="color: white; text-align: center;padding-top: 3rem;">Delete Student's accounts</h1>
    <form action="../PHP/deleteuser.php" method="post">
  <input style="border:#ffffff 0.2rem solid;" required name="stud" list="students">
  <datalist id="students">
  <?php 
                 
                 while($row=$resultObj->fetch_assoc()) : ?>
                 <option value="<?=$row['FullName']?>"></option>
                    <?php endwhile; ?>
  </datalist>
<br>
        <input class="x" type="submit" name="delete" value="Delete">
    </form><br>
    <h1 style="color: white; text-align: center;">Delete Teacher's accounts</h1>
    <form action="../PHP/deleteuser.php" method="post">
  <input style="border:#ffffff 0.2rem solid;" required name="tea" list="teachers">
  <datalist id="teachers">
  <?php 
                 
                 while($row=$resultObj2->fetch_assoc()) : ?>
                 <option value="<?=$row['FullName']?>"></option>
                    <?php endwhile; ?>
  </datalist>
<br>
        <input class="x" type="submit" name="deletetea" value="Delete">
    </form>
       </div>

      
</body>
</html>