<?php
//Variabler för host, user osv som används i databasen
$server= "localhost";
$dbName = "contactsdb";
$dbUser = "root";
$dbPass = "root";
$dbDSN = "mysql:host=$server;dbname=$dbName;charset=UTF8";


try{
    //initierar en databas
    $conn= new PDO($dbDSN, $dbUser, $dbPass);
    //Avslutar vid minsta fel
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   
catch(PDOException $e){
    echo "<p>Connection failed " . $e->getMessage() ."</p>";
    exit();
}
?>