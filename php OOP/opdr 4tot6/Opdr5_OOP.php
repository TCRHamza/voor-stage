<?php 

class Product
{


 public $name = "Schoen zonder naam";
 public $price ;
 public $category;


 public function __construct($name, $price)
 {
    $this->name = ucwords($name);
    $this->price = $price;
 }

 public function formatPrice()
 {
    return number_format($this->price, decimals:2);

 }


 public function setCategory($category){

   $this->category = ucfirst($category);
 
  }
 
 
}

$shoe1 = new Product("nike air max alpha", 40);
$shoe1->setCategory("runners");


$shoe2 = new Product("nike sock dart premium", 100);
$shoe2->setCategory("sneakers");


$shoe3 = new Product("nike east trail", 90);
$shoe3->setCategory("hikers");


$shoe4 = new Product("nike hoops 3.0", 50);
$shoe4->setCategory("sporters");




echo '<br>';


echo $shoe1->name . '<br>';
echo $shoe1->formatPrice() . '<br>';
echo $shoe1->category . '<br>'. '<br>';


echo $shoe2->name . '<br>';
echo $shoe2->formatPrice() . '<br>';
echo $shoe2->category . '<br>'. '<br>';


echo $shoe3->name . '<br>';
echo $shoe3->formatPrice() . '<br>';
echo $shoe3->category . '<br>'. '<br>';


echo $shoe4->name . '<br>';
echo $shoe4->formatPrice() . '<br>';
echo $shoe4->category . '<br>'. '<br>'. '<br>';


var_dump($shoe1);
echo '<br>';
var_dump($shoe2);
echo '<br>';
var_dump($shoe3);
echo '<br>';
var_dump($shoe4);
?>