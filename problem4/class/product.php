<?php
class Product
{
    // object properties
    public $id;
    public $name;
    public $weight;
    public $base;
    public $height;
    public $width;
    // constructor to create products on the fly
    public function __construct($id, $name, $weight, $base, $height, $width)
    {
        $this->id = $id;
        $this->name = $name;
        $this->weight = $weight;
        $this->base = $base;
        $this->height = $height;
        $this->width = $width;
    }
    // id getter
    public function getId()
    {
        return $this->id;
    }

    public function getProducts()
    {
        // get existing products and convert from json to an array
        $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/myPassionMedia/problem4/db/db.json") or die();
        return json_decode($file);

    }
    // save new products addeds to JSON db
    public function setProduct()
    {
        // get the existing products array
        $products = $this->getProducts();
        // push the new product to the array
        array_push($products, $this);
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/myPassionMedia/problem4/db/db.json", "w+") or die("not opened");
        fwrite($file, json_encode($products));
        fclose($file);
    }
    // edit existing products
    public function updateProduct()
    {
        $products = $this->getProducts();

        for ($i = 0; $i < COUNT($products); $i++) {
            if ($products[$i]->id == $this->getId()) {
                $products[$i] = $this;
            }
        }
        // open db
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/myPassionMedia/problem4/db/db.json", "w+") or die("not opened");
        fwrite($file, json_encode($products));
        fclose($file);
        return $products;

    }
    // delete product
    public function deleteProduct()
    {
        $products = $this->getProducts();
        $tempProducts = [];
        for ($i = 0; $i < COUNT($products); $i++) {
            if ($products[$i]->id != $this->getId()) {
                $products[$i] = $this;
            }
        }
        //opendb
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/myPassionMedia/problem4/db/db.json", "w+") or die("not opened");
        fwrite($file, json_encode($products));
        fclose($file);
    }

}
