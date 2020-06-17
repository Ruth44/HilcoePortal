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
             <li id="home"><a href="#">HOME</a></li>
             <li id="course"><a href="material.php">COURSE MATERIALS</a></li>
             <li id="assignment"><a href="assignment.php">ASSIGNMENTS</a></li>
             <li id="grade"><a href="grade.php">GRADE REPORT</a></li>
         </ul>
       </div> 

       <!-- Homepage for all -->

       <div style="overflow: hidden;" class="cont homee">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 style="text-align:center;margin-top:0rem;color:#e5bf3b;font-weight:900;">Welcome <?php echo $name?></h1>
        <p>Catch up on some news right here.</p>
      <table style="width: 60rem;">
    <thead>
      <tr>
        <th style="width: 40rem;" scope="col">News</th>
        <th scope="col">Uploaded by</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
  <?php
   $connection=new PDO("mysql:host=localhost;dbname=hilcoeapp","Ruth","87654321");
$stat=$connection->prepare("select * from announcement order by date");
$stat->execute();
while($row=$stat->fetch()){
 
  echo "<tr><td>".$row['News']."</td>"."<td>".$row['adminUserId']."</td>"."<td>".$row['date']."</td></tr>";
}
  ?>
</tbody>
</table>
       </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>