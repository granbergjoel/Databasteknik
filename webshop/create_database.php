<?php

require_once ('dbwebshop.php');

// Ta bort databasen!

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
    item varchar (50),
    price int (11), 
    img varchar (255),
    descriptions varchar (255),
    PRIMARY KEY (product_id)
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
    customer varchar (50),
    phone varchar(50),
    email varchar (50),
    custom_add varchar(50),
    PRIMARY KEY (order_id) 
)"
);

/***********************************
*
*       Här skapar vi
*       våra meddelanden
*
***********************************/

$conn->exec("CREATE TABLE contacts(
    contact_id int(11) NOT NULL AUTO_INCREMENT,
    customer varchar(50),
    email varchar (50),
    messages varchar(255),
    PRIMARY KEY (contact_id) 
)"
);



$stmt = $conn->prepare(
"INSERT INTO products(item, price, img, descriptions) VALUES ('Choco Cupcakes' ,11 ,'img/0_sm.jpg' ,'A classic snack. Rich chocolate on a moist cupcake');
INSERT INTO products(item, price, img, descriptions) VALUES ('Blueberry Bomb' ,9 ,'img/1_sm.jpg' ,'A delicious blueberry pastry with sugar frosting' );
INSERT INTO products(item, price, img, descriptions) VALUES ('Sweet Croissant',7,'img/2_sm.jpg' ,'A crispy, puffy croissant filled with vanilla cream');
INSERT INTO products(item, price, img, descriptions) VALUES ('Cinnamon Rolls',12,'img/3_sm.jpg' ,'Sugar, cinnamon and flour. Can it be better?');
INSERT INTO products(item, price, img, descriptions) VALUES ('Eastern Pastries',9,'img/4_sm.jpg' ,'Exotic pastry topped with pistage nuts');
INSERT INTO products(item, price, img, descriptions) VALUES ('Puff Pastry',13,'img/5_sm.jpg' ,'Thick vanilla cream in an crusty puff pastry');
INSERT INTO products(item, price, img, descriptions) VALUES ('Macarons',6,'img/6_sm.jpg' ,'French macarons in all colors of the rainbow');
INSERT INTO products(item, price, img, descriptions) VALUES ('Jelly Donuts',8,'img/7_sm.jpg' ,'A staple in the baking community, rolled in sweet sugar');
INSERT INTO products(item, price, img, descriptions) VALUES ('Mini Pastries',7,'img/8_sm.jpg' ,'When you just want a nibble, topped with fresh strawberries');");

$stmt->execute();