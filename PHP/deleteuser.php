<?php
include_once 'connection.php';
session_start();

if(isset($_POST['delete'])){
    $student=$_POST["stud"];

  
    $query="SELECT UserID from student where FullName='$student'";
    $result=$connection->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id=$row['UserID'];
            
        }
        
        $query="DELETE FROM student where FullName='$student'";
        $query2="DELETE FROM user where ID='$id'";
        $result2=$connection->query($query);
        $result3=$connection->query($query2);

    }
    else{
       
    }

header("Location: ../Pages/admindelete.php");
}
if(isset($_POST['deletetea'])){
    $tea=$_POST["tea"];

  
    $query="SELECT UserId from teacher where FullName='$tea'";
    $result=$connection->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id=$row['UserID'];
            
        }
        
        $query="DELETE FROM teacher where FullName='$tea'";
        $query2="DELETE FROM user where ID='$id'";
        $result4=$connection->query($query);
        $result5=$connection->query($query2);

    }
    else{
       
    }

header("Location: ../Pages/admindelete.php");
}
?>