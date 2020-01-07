<?php

require_once "./class/product.php";

// get current count of products
$temp = new Product(-1, $name, $weight, $base, $height, $width);
$products = $temp->getProducts();

// return the product to the client
echo json_encode($products);
