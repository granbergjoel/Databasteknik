<?php

include_once ("header.php");
require_once ("dbwebshop.php");

$conn->exec("USE $dbName");

$id=$_GET['id'];

//FETCH ALL med kundinfo
$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=$id");

$stmt->execute();

$result = $stmt->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";

//Skriv ut kundinfo till ett meddelande
foreach($result as $key =>$value){
$message = "<div class='alert alert-success' role='success'>
            <p>Hej $value[customer]!</p>
            <p>En order har skapats med Order-id:$value[order_id]!</p>
            </div>";
        }
 echo $message;

include_once ("footer.php");
