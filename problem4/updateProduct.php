<?php

require_once "./class/product.php";

// get the product info from the ajax call
$id = $_POST['id'];
$name = $_POST['name'];
$base = $_POST['base'];
$height = $_POST['height'];
$width = $_POST['width'];
$weight = $_POST['weight'];

$temp = new Product($id, $name, $weight, $base, $height, $width);

$update = $temp->updateProduct();

// $res = $temp->getProducts();

// return the product to the client
echo json_encode($update);
