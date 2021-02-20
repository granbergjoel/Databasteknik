<br>

<div class="row">

  <div class="col-lg-2">
  </div>

    <div class="row">

<?php

require_once ("header.php");
require_once ("dbwebshop.php");

//if (isset ($_GET['id'])){
$conn->exec("USE $dbName");
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = $_GET[id]");
$stmt->execute();

$result = $stmt->fetchAll();

$order = "<div class='row'>";

foreach($result as $key => $value){ 

    $order .= "

    <div class='col-lg-2 col-md-2 mb-2'></div>

<div class='col-lg-4 col-md-5 mb-5'>
  <div class='card h-100'>
  <a href='#'><img class='card-img-top' src='$value[img]' alt=''></a>
      <div class='card-body'>
      <h4 class='card-title'><a href='order.php?id=$value[product_id]'>$value[item]</a></h4>
      <h5>$value[price] $</h5>
      <p class='card-text'>$value[descriptions]</p>
      </div>
  </div>
</div>

    <div class='card h-100 col-lg-6 col-md-5 mb-5'>
    <div class='card-body'>

      <form action='#' class='row' method='post'>

        <div class='col-md-7 my-2'>
        <label for='names'>Name:</label>
        <input id='text' type=' text' class='form-control' name='customer' required>
        </div>

        <div class='col-md-5 my-2'>
        <label for='email'>Phone:</label>
        <input type='text' class='form-control' name='phone' required>
        </div>

        <div class='col-md-12 my-2'>
        <label for='names'>Email:</label>
        <input id='text' type=' text' class='form-control' name='email' required>
        </div>

        <div class='col-md-12 my-2' rows='3'>
        <label for='names'>Address:</label>
        <input id='text' type=' text' class='form-control' name='custom_add' required>
        </div>

        <div class='col-md-4 my-2'>
        <input type='submit' value='Submit order' class='form-control btn btn-success'>
        </div>

      </form>

    </div>
    </div>

    <div class='col-lg-2 col-md-2 mb-2'></div>
 ";
} 
        
$order .= "</div>";
echo $order;
     
?>
<div class="col-lg-2">
</div>

  <!-- /.row -->
  </div>

    <!-- /.row -->
    </div>    

<?php require_once ("footer.php");?>

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  echo $email;
  $stmt = $conn->prepare("SELECT * FROM customers
  WHERE customers.email='$email'");
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == null){
    echo "kund saknas";

    $customer = filter_var($_POST['customer'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $custom_add = filter_var($_POST['custom_add'], FILTER_SANITIZE_STRING);
    
    $stmt = $conn->prepare("INSERT INTO customers (customer , phone, email, custom_add)
    VALUES (:customer , :phone , :email, :custom_add)");
    
    $stmt->bindParam(':customer', $customer);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':custom_add', $custom_add);
    
    $stmt->execute();
    
    $customer_id=$conn->lastInsertId();
    echo "Kund ID: ". $customer_id; 

   

  } else {

    $stmt = $conn->prepare("SELECT * FROM customers
    WHERE customers.email='$email'");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $customer_id = $result[0]['customer_id'];
    echo "Den gamla kunden har ID: ". $customer_id;

  }


// CREATE ORDER
$product_id = $_GET['id'];
echo "Produkt-ID: ". $product_id;


$stmt = $conn->prepare("INSERT INTO orders (product_id, customer_id)
VALUES (:product_id ,:customer_id)");
$stmt->bindParam(':customer_id', $customer_id);
$stmt->bindParam(':product_id', $product_id);

$stmt->execute();

$last_order_id=$conn->lastInsertId();

header("Location: confirmation.php?id=$last_order_id");

}


?>