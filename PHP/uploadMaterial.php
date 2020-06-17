<?php

$connection=new PDO("mysql:host=localhost;dbname=hilcoeapp","Ruth","87654321");


if(isset($_POST['btnTeaCou'])){
    
    $Code=$_POST['Coursee'];
    $name=$_FILES['myfile']['name'];
    $type=$_FILES['myfile']['type'];
    $namee=$_POST['fileName'];
    $data= file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt= $connection->prepare("INSERT INTO `coursematerial`(`ID`, `Ccode`, `Name`, `type`, `File`) VALUES ('',?,?,?,?)");
    $stmt->bindParam(1,$Code);
    $stmt->bindParam(2,$namee);
    $stmt->bindParam(3,$type);
    $stmt->bindParam(4,$data);
    $stmt->execute();
   header("Location: ../Pages/material.php?status=successful");
}
else   header("Location: ../Pages/material.php?status=unsuccesful");

 ?>