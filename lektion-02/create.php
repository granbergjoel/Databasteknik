<?php

/*****************************
* 
*        Create
*     Skapa en ny kontakt
* 
*****************************/
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once ("database.php");
    /*
echo "<pre>";
print_r($_POST);
echo "</pre>";
    */
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$address = $_POST['address'];

// Skapa en SQL-sats (förbereda ett statement)
$stmt = $conn->prepare("INSERT INTO contacts (name,    tel, email, address)
                    VALUES (:name , :tel , :email, :address)");

//Binda parametrar (binda variabler med platshållare)
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':tel' , $tel);
$stmt->bindParam(':email' , $email);
$stmt->bindParam(':address' , $address);

//Kör SQL-satsen
$stmt->execute();

//Hämta senaste ID som infogats med A_I
$last_id=$conn->lastInsertId();


$message= "<div class='alert alert-success' role='alert'>
<p>$name har sparats i databasen med id=$last_id</p>
</div>";


}
    ?>


<form action="#" class="row" method="post">

<div class="col-md-3 my-2">
Namn<input type="text" class="form-control" name="name">
</div>

<div class="col-md-3 my-2">
Tel<input type="text" class="form-control" name="tel">
</div>

<div class="col-md-3 my-2">
Email<input type="text" class="form-control" name="email">
</div>

<div class="col-md-3 my-2">
Address<input type="text" class="form-control" name="address">
</div>

<div class="col-md-3 my-2">
    <input type="submit" value="Lägg till" class="form-control btn btn-outline-info">
</div>



</form>

<?php  if (isset($message)) echo $message; ?>
