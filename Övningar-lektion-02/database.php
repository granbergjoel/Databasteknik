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


<!doctype html>
<html lang="sv">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Joels Telefonlista</title>
  </head>
  <body class="container">
    <h1 class="text-center">Joels Telefonlista</h1>

    <form action="#" class="row" method="post">

    <div class="col-md-4 mt-2">
        <input type="text" class="form-control" name="name">
    </div>
    
    <div class="col-md-4 mt-2">
        <input type="text" class="form-control" name="tel">
    </div>

    <div class="col-md-4 mt-2">
        <input type="submit" value="Lägg till" class="form-control btn btn-outline-info">
    </div>

    </form>

<?php

/*****************************
 * 
 *      Create
 *  Skapa en ny kontakt
 * 
 ****************************/
if ($_SERVER["REQUEST_METHOD"] == "POST"){
echo "<pre>";
print_r($_POST);
echo "</pre>";

$name = $_POST['name'];
$tel = $_POST['tel'];

//echo "namn: $name <br>";
//echo "tel: $tel";


// Skapa en SQL-sats (förbereda ett statement)
$stmt = $conn->prepare("INSERT INTO contacts (name, tel)
                        VALUES (:name , :tel )");

//Binda parametrar (binda variabler med platshållare)
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':tel' , $tel);

//Kör SQL-satsen
$stmt->execute();

//Hämta senaste ID som infogats med A_I
$last_id=$conn->lastInsertId();
echo "<p>$name har sparats i databasen med id=$last_id</p>";


}
?>

  </body>
</html>
