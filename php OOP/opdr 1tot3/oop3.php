<?php 

class Product
{


 public $name = "Schoen zonder naam";
 public $price ;


 public function formatPrice()
 {
    return number_format($this->price, decimals:2);

 }
 
}

$shoe1 = new Product();
$shoe1->name = "Nike Air Max Alpha";
$shoe1->price = 70;

$shoe2 = new Product();
$shoe2->name = "Nike Sock Dart Premium";
$shoe2->price = 100;

$shoe3 = new Product();
$shoe3->name = "Nike East Trail";
$shoe3->price = 90;

$shoe4 = new Product();
$shoe4->name = "Nike Hoops 3.0";
$shoe4->price = 50;



echo '<br>';

echo $shoe1->formatPrice() . '<br>';
echo $shoe1->name . '<br>';
echo $shoe1->price . '<br>';

echo $shoe2->formatPrice() . '<br>';
echo $shoe2->name . '<br>';
echo $shoe2->price . '<br>';

echo $shoe3->formatPrice() . '<br>';
echo $shoe3->name . '<br>';
echo $shoe3->price . '<br>';

echo $shoe4->formatPrice() . '<br>';
echo $shoe4->name . '<br>';
echo $shoe4->price . '<br>';

var_dump($shoe1);
echo '<br>';
var_dump($shoe2);
echo '<br>';
var_dump($shoe3);
echo '<br>';
var_dump($shoe4);
?>