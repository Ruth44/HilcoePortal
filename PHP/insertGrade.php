<?php
include_once 'connection.php';
session_start();

if(isset($_POST['Go'])){
    $course=$_POST["Course"];
    $grdd=$_POST['grd'];
    if($grdd>90){
        $grade="A+";
    }
    else if($grdd> 85){
        $grade="A";
    }
    else if($grdd>80){
        $grade="B+";
    }
    else if($grdd>70){
        $grade="B";
    }
    else if($grdd>60{
        $grade="C";
    }
    else if($grdd>50){
        $grade="D";
    }
    else $grade="F";
   
    $studentcode=$_POST['code'];
  
    $query="SELECT ID FROM grade where Ccode='$course' and StuCode='$studentcode'";
    $result=$connection->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id=$row['ID'];
            
        }
        
        $query2="UPDATE grade SET Grade='$grade' WHERE ID='$id'";
        $result=$connection->query($query2);
    }
    else{
        $query="INSERT INTO `grade`(`ID`, `Ccode`, `Grade`, `StuCode`) VALUES ('','$course','$grade','$studentcode')";
        $result=$connection->query($query);
    }

header("Location: ../Pages/accounts.php");
}
?>