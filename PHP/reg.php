<?php

include_once 'connection.php';
session_start();

if(isset($_POST['submit'])){
    $type=$_POST["type"];
    $fullname=$_POST['name'];
    $id=$_POST['id'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $gender=$_POST["gender"];
    $queryy="SELECT ID FROM user where Username='$username'";
    $resulttt=$connection->query($queryy);
    if ($resulttt->num_rows > 0){
      header("Location: ../Pages/register.php?status=unsuccessful"); }
      else{

    $query1="INSERT INTO user(Username, Password, Role, Email) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt,$query1);
    mysqli_stmt_bind_param($stmt,"ssis",$username,$password,$type,$email);
    mysqli_stmt_execute($stmt);
    $last_id = $connection->insert_id;
    $_SESSION['USER_EMAIL']=$email;
    $_SESSION['uname']=$username;
    $_SESSION['Role']=$type;
    $_SESSION['id']=$id;
  if($type==1){
    $query2="INSERT INTO Student(StudentCode, FullName, Gender, UserID) VALUES (?,?,?,?);";
  }
  else if($type==2){
    $query2="INSERT INTO teacher(TeaCode, FullName, Gender, UserID) VALUES (?,?,?,?);";
  }
  else{
    $query2="INSERT INTO administrate(AdminCode, FullName, Gender, UserID) VALUES (?,?,?,?);";
  }
   
    $stmt=mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt,$query2);
    mysqli_stmt_bind_param($stmt,"sssi",$id,$fullname,$gender,$last_id);
    mysqli_stmt_execute($stmt);
      

    
if($_SESSION['Role']==3){
  header("Location: ../Pages/admindash.php");
} else{
  header("Location: ../Pages/accounts.php");
}

      }

}else{
    header("Location: ../Pages/register.php?status=unsuccessful"); 
}
?>