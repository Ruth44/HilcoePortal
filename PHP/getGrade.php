<?php
session_start();
require 'connection.php';
$CouCode=$_POST["Courses"];
$_SESSION['C']=$CouCode;
$username=$_SESSION['uname'];
$query="SELECT
`ID`
FROM
`user`
WHERE
Username = '$username'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     
      $id=$row["ID"];
    }
  }
$query2="SELECT `StudentCode` FROM `student` WHERE UserId='$id'";
$result2 = $connection->query($query2);

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
      
      $code=$row["StudentCode"];
    }
  }
  $query3="SELECT  `Grade` FROM `grade` WHERE StuCode='$code' AND Ccode='$CouCode'";
  $result3 = $connection->query($query3);

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
      $grade=$row["Grade"];
      $_SESSION["Grade"]=$grade;
      
      header("Location: ../Pages/grade.php");
    }
  }
  else {
    $_SESSION["Grade"]="Not Posted yet";
    header("Location: ../Pages/grade.php");
  }
