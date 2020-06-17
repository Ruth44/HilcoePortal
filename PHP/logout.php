<?php
session_start();
if(isset($_POST['logout'])){
   
    header("Location: ../Pages/Home.php");
    session_destroy();
}