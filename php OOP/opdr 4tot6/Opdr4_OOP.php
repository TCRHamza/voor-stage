<?php 

class Product
{


 public $name = "Schoen zonder naam";
 public $price ;
 public $category;


 public function formatPrice()
 {
    return number_format($this->price, decimals:2);

 }

 public function setName($name){

  $this->name = ucwords($name);

 }

 public function setCategory($category){

   $this->category = ucfirst($category);
 
  }
 
 
}

$shoe1 = new Product();
$shoe1->setName("nike air max alpha");
$shoe1->price = 70;
$shoe1->setCategory("runners");


$shoe2 = new Product();
$shoe2->setName("nike sock dart premium");
$shoe2->price = 100;
$shoe2->setCategory("sneakers");


$shoe3 = new Product();
$shoe3->setName("nike east trail");
$shoe3->price = 90;
$shoe3->setCategory("hikers");


$shoe4 = new Product();
$shoe4->setName("nike hoops 3.0");
$shoe4->price = 50;
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