<?php

require_once ('arrays.php');
require_once ('database.php');

// TA bort databasen!

$conn->exec("DROP DATABASE IF EXISTS $dbName");
echo "<h2>$dbName deleted</h2>";

// Skapa en ny databas
$conn->exec("CREATE DATABASE IF NOT EXISTS $dbName
             CHARACTER SET utf8
             COLLATE utf8_swedish_ci;");
echo "<h2>$dbName created</h2>";

$conn->exec("USE $dbName");
echo "<h2>$dbName selected!</h2>";


/***********************************
*
*       Här skapar vi
*       våra produkter
*
***********************************/

$conn->exec("CREATE TABLE products(
    product_id int(11) NOT NULL AUTO_INCREMENT,
    price int (11), 
    images varchar (255),
    descriptions varchar (255),
    names varchar (50),
    PRIMARY KEY (product_id)
)"
);

foreach ($nameArray as $key => $name) {
    $sql = "INSERT INTO products (names) VALUES ('$name')";
    $conn->exec($sql);    
    echo "<p>$name added to firstNamesMale successfully</p>";
}

/***********************************
*
*       Här skapar vi
*       våra kunder
*
***********************************/

$conn->exec("CREATE TABLE customers(
    customers_id int(11) NOT NULL AUTO_INCREMENT,
    names varchar (50),
    phone varchar(50),
    email varchar (50),
    addresses varchar(50),
    PRIMARY KEY (customers_id)
)"
);

/***********************************
*
*       Här skapar vi
*       våra ordrar
*
***********************************/

$conn->exec("CREATE TABLE orders(
    order_id int(11) NOT NULL AUTO_INCREMENT,
    product_id int (11),
    customer_id int(11),
    PRIMARY KEY (order_id) 
)"
);

/***********************************
*
*       Här skapar vi
*       våra meddelanden
*
***********************************/

$conn->exec("CREATE TABLE contact(
    contact_id int(11) NOT NULL AUTO_INCREMENT,
    names varchar(50),
    email varchar (50),
    messages varchar(255),
    PRIMARY KEY (contact_id) 
)"
);



