<?php

require_once "./class/product.php";

// get the product info from the ajax call
$name = $_POST['name'];
$base = $_POST['base'];
$height = $_POST['height'];
$width = $_POST['width'];
$weight = $_POST['weight'];
// get current count of products
$temp = new Product(-1, $name, $weight, $base, $height, $width);
$tempCount = COUNT($temp->getProducts());
// create the product and save it to the db
$tempProduct = new Product($tempCount + 1, $name, $weight, $base, $height, $width);
$tempProduct->setProduct();
// return the product to the client
echo json_encode($tempProduct);
