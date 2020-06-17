<?php
session_start();
if(!isset($_POST['login'])){
    header("Location: ../Pages/login.php");
}else{

    include 'connection.php';
    $name=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM user WHERE Username='$name' AND Password='$password' ";
    $mine=mysqli_stmt_init($connection);
    $user=mysqli_num_rows(mysqli_query($connection,$query));
    if($user>=1){
    if(!mysqli_stmt_prepare($mine,$query)){
     header("Location: ../Pages/login.php");
    }else{
    mysqli_stmt_execute($mine);
    $result=mysqli_stmt_get_result($mine);
    while($row=mysqli_fetch_assoc($result)){
        $uname = $row['Username'];
        $email = $row['Email'];
        $role  = $row["Role"];
        
            $_SESSION['Email']=$email;
            $_SESSION['Role']=$role;
            $_SESSION['uname']=$name;
            if($_SESSION['Role']==3){
                header("Location: ../Pages/admindash.php");
              } else{
                header("Location: ../Pages/accounts.php");
              }
    
        }
    }
}
    else{
    header("Location: ../Pages/login.php");
    }
}



