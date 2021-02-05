<?php
require_once ("header.php");
require_once ("database.php");

/*****************************
* 
*        Update
*     Uppdatera en ny kontakt
* 
*****************************/

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Uppdatera databasen
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    $sql = "UPDATE contacts SET name = :name, tel = :tel WHERE id = :id"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->execute();

    echo $stmt->rowCount(). " rad har ändrats!";
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch();

$name = $result['name'];
$tel = $result['tel'];

?>
<h2 class="text-center">Uppdatera</h2>

<form action="#" class="row" method="post">

<div class="col-md-6 my-2">
    <label for="name" class="form-label">Ange Namn</label>
    <input id="name" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
</div>

<div class="col-md-6 my-2">
<label for="name" class="form-label">Ange Telefon</label>
    <input id="name" type="text" class="form-control" name="tel" value="<?php echo $tel; ?>">
</div>

<div class="col-md-6 my-2">
    <input type="submit" value="Lägg till" class="form-control btn btn-outline-info">
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>">


</form>


<?php
require_once ("footer.php");
?>
