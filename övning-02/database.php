<?php

$server="localhost";
$dbName="maillista";
$dbUser="root";
$dbPass="root";
$dbDSN="mysql:host=$server;dbname=$dbName;charset=UTF8";

try{
    $conn=new PDO($dbDSN, $dbUser,$dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
    echo "<p>Connection failed ".$e->getMessage()."</p>";
    exit();
}