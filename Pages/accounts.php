<?php
session_start();
$name=$_SESSION['uname'];

require '../PHP/connection.php';
$query="SELECT CCode, Name FROM course ORDER BY name";
$resultObj=$connection->query($query);
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
$st=$_SESSION['status'];
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


       <!-- CourseMaterial for Students -->


       <div class="cont studentcourse">
        <img class="logo" src="../images/logo.png" alt="Logo">
      
        <h1 style="text-align:center">COURSE MATERIALS</h1>
        <p>Click on the links below(Names) to open/download the files.</p>
      
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
$stat=$connection->prepare("select * from coursematerial");
$stat->execute();
while($row=$stat->fetch()){
    echo "<tr><td><a target='_blank' href='viewMaterial.php?id=".$row['ID']."'>".$row['Name']."</a></td>"."<td>".$row['Ccode']."</td></tr>";

}
    ?>
</tbody>
</table>
       </div>

           <!-- CourseMaterial for Teachers -->


        <div style="  overflow: hidden;" class="cont teachercourse">
        <img class="logo" src="../images/logo.png" alt="Logo">
      
        <h1 style="text-align:center">COURSE MATERIALS</h1>
        <p>Upload course materials below. Please fill out all the fields.</p>
       
        <form action="../PHP/uploadMaterial.php" method="post" enctype="multipart/form-data">
        <select name="Coursee"> 
                    <?php while($row=$resultObj->fetch_assoc()) : ?>
                    <option value="<?=$row['CCode']?>"><?=$row['Name']?> </option>
                       <?php endwhile; ?>
                       </select><br>
    <input type="file" name="myfile"><br>
    <input type="text" name="fileName"><br>
    <button name="btnTeaCou">Upload</button>

</form>

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