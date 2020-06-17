<?php
include_once 'connection.php';
session_start();

if(isset($_POST['upload'])){
    $news=$_POST["news"];
    $username=$_SESSION['uname'];
    
  $date=date("Y-m-d");
    $query="INSERT INTO `announcement`(`ID`, `adminUserId`, `News`, `date`) VALUES ('','$username','$news','$date')";
    $result=$connection->query($query);
    header("Location: ../Pages/newsupload");
}