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
         <li id="home"><a href="accounts.php">HOME</a></li>
             <li id="course"><a href="material.php">COURSE MATERIALS</a></li>
             <li id="assignment"><a href="#">ASSIGNMENTS</a></li>
             <li id="grade"><a href="grade.php">GRADE REPORT</a></li>
         </ul>
       </div> 

     
    

       <!-- Assignment for Students -->


       <div class="cont studentass">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 style="text-align:center">ASSIGNMENTS</h1>
        <p>Click on the links below(Names) to open/download the assignments.</p>
        <table>
      
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Course Code</th>
        </tr>
      </thead>
      <tbody>
    <?php
     $connection=new PDO("mysql:host=localhost;dbname=hilcoeapp","Ruth","87654321");
$stat=$connection->prepare("select * from assignment");
$stat->execute();
    while($row=$stat->fetch()){
        echo "<tr><td><a target='_blank' href='../PHP/view.php?id=".$row['ID']."'>".$row['Name']."</a></td>"."<td>".$row['Ccode']."</td></tr>";
        
    
    }
        ?>
    </tbody>
    </table>
       </div>

              <!-- Assignment for Teachers -->


        <div style="overflow: hidden;" class="cont teacherass">
        <img class="logo" src="../images/logo.png" alt="Logo">
        <h1 style="text-align:center">ASSIGNMENT</h1>
        <p>Upload your assignment below. Please fill out all the fields.</p>
        <form action="../PHP/uploadAssignment.php" method="post" enctype="multipart/form-data">
        
    <input type="file" name="myfile"><br>
    <input type="text" name="fileName" placeholder="File Name"><br>
    <input type="text" name="CourseCode" placeholder="Course Code"><br>
    <button name="btnasstea">Upload</button>
</form>

       </div>



      
       

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>