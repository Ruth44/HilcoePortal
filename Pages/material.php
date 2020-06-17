<?php
session_start();
$name=$_SESSION['uname'];

require '../PHP/connection.php';
$query="SELECT CCode, Name FROM course ORDER BY name";
$resultObj=$connection->query($query);
$role=$_SESSION['Role'];
if($role==1){
    $type='Student';
}
else if($role==2){
    $type='Teacher';
}

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

       



      
       

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/dashboard.js"></script>
    </body>
</html>