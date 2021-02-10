<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("database.php");

    echo "<pre";
    print_r($_POST);
    echo "</pre";

 

    $mail=$_POST['mail'];
    
    $stmt = $conn->prepare("INSERT INTO maillista (mail)
        VALUES (:mail)");

    $stmt->bindParam(':mail', $mail);

    $stmt->execute();

    $lastID = $conn->lastInsertId();

    if (empty($_POST["check"])) {
        echo "Gender is required";
      } else {
        echo "succe!";
      }

    $message= "<div class='alert alert-success' role='alert'>
    <p>$mail har sparats i databasen med id: $lastID</p>
    </div>";
}

?>

<div class="container">
  <h2>Skriv upp dig på vår maillista</h2>
  <form action="#" method="post">
    <div class="form-group">
      <label for="mail">Mailaddress:</label>
      <input type="mail" class="form-control" id="mail" placeholder="Skriv din mail här..." name="mail">
    </div>
    
    <div class="form-group form-check" custom="control checkbox">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="check"> Godkänn vår integritetspolicy
      </label>
    </div>

   

    <div class="col-md-3 my-2">
    <input type="submit" value="Lägg till" class="form-control btn btn-outline-info">
    </div>


  </form>
</div>

<?php  if (isset($message)) echo $message; ?>