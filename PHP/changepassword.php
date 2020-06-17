<?php
include_once 'connection.php';
session_start();

if(isset($_POST['confirm'])){
    $old=$_POST["old"];
    $new=$_POST['new'];
   $name= $_SESSION['uname'];
   $query="SELECT ID FROM user where Username='$name' and Password='$old'";
   $result=$connection->query($query);
   if ($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $query2="UPDATE user SET Password='$new' WHERE Username='$name'";
        $result=$connection->query($query2);
           header("Location: ../Pages/accounts.php?status=successful");
       }
   }else header("Location: ../Pages/accounts.php?status=unsuccessful");
}
   else header("Location: ../Pages/accounts.php?status=unsuccessful");