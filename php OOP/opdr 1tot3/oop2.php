<?php 

class Product
{


 public $name = "Schoen zonder naam";
 
}

$shoe1 = new Product();
$shoe1->name = "Nike Air Max Alpha";

$shoe2 = new Product();
$shoe2->name = "Nike Sock Dart Premium";

$shoe3 = new Product();
$shoe3->name = "Nike East Trail";

$shoe4 = new Product();
$shoe4->name = "Nike Hoops 3.0";



echo '<br>';

echo $shoe1->name;
echo '<br>';
echo $shoe2->name;
echo '<br>';
echo $shoe3->name;
echo '<br>';
echo $shoe4->name;
echo '<br>';

$shoe3->name = "Adidas Pure Boost";
echo $shoe3->name;

var_dump($shoe1);
echo '<br>';
var_dump($shoe2);
echo '<br>';
var_dump($shoe3);
echo '<br>';
var_dump($shoe4);
?>