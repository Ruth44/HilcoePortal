<?php
$connection=new PDO("mysql:host=localhost;dbname=hilcoeapp","Ruth","87654321");
$id=isset($_GET['id'])? $_GET['id']: "";
$stat= $connection->prepare("select * from coursematerial where ID=?");
$stat->bindParam(1,$id);
$stat->execute();
$row=$stat->fetch();
header('Content-Type:'.$row['type']);
echo $row['File'];