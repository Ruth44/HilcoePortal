<?php
require '../PHP/connection.php';
$query="SELECT COUNT(ID) AS Users FROM user;";
$query2="SELECT COUNT(ID) AS Users FROM user where Role='1';";
$query3="SELECT COUNT(ID) AS Users FROM user where Role='2';";
$query4="SELECT COUNT(DISTINCT(StuCode)) AS Users FROM grade where Grade IN ('A', 'A+', 'B+');";
$result = $connection->query($query);
$result2= $connection->query($query2);
$result3= $connection->query($query3);
$result4= $connection->query($query4);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     
      $users=$row["Users"];
    }
  }
  if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
     
      $students=$row["Users"];
    }
  }
  if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
     
      $teachers=$row["Users"];
    }
  }
  if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {
     
      $excellent=$row["Users"];
    }
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
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
         <li id="report"><a href="#">REPORTS</a></li>
         <li id="upload"><a href="newsupload.php">UPLOAD NEWS</a></li>
         <li id="delete"><a href="admindelete.php">DELETE USERS</a></li>

         </ul>
       </div> 
       <div style="overflow:hidden;width:64rem;" class="cont dash">
<div style="margin-left:13rem;margin-top:1rem;" class="counter">
<h2 data-target="<?php echo $users?>">0</h2>
<h3>All Users</h3>
</div>
<div style="margin-left:37rem;margin-top:20rem;" class="counter">
<h2 data-target="<?php echo $students?>">0</h2>
<h3>Students</h3>
</div>
<div style="margin-left:13rem;margin-top:20rem;"  class="counter">
<h2 data-target="<?php echo $teachers?>">0</h2>
<h3>Teachers</h3>
</div > 
<div style="margin-left:37rem;margin-top:1rem;" class="counter">
<h2> <?php echo $excellent?> </h2>
<h3 >Students with excellent scores</h3>
</div>
       </div>

       <script src="../scripts/counter.js"></script>
</body>
</html>