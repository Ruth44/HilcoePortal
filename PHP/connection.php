<?php

$dbUsername="Ruth";
$dbPassword="87654321";
$dbServer="localhost";
$dbName="hilcoeapp";

$connection=new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);

if($connection->connect_errno)
{
    exit("Database Connection has failed. Reason: " . $connection->connect_error);
}

?>
