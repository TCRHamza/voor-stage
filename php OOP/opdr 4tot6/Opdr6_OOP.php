<?php

class Product
{
    public $name = "Schoen zonder naam";
    public $price;
    public $category;
    public $currency;

    public function __construct($name, $price, $currency = "&euro;")
    {
        $this->name = ucwords($name);
        $this->price = $price;
        $this->currency = $currency;
    }

    public function formatPrice()
    {
        return $this->currency . number_format($this->price, 2);
    }

    public function setCategory($category)
    {
        $this->category = ucfirst($category);
    }
}

$shoe1 = new Product(name: "nike air max alpha", price: 40, currency: "&euro;");
$shoe1->setCategory("runners");

$shoe2 = new Product(name: "nike sock dart premium", price: 100, currency: "&euro;");
$shoe2->setCategory("sneakers");

$shoe3 = new Product(name: "nike east trail", price: 90, currency: "&euro;");
$shoe3->setCategory("hikers");

$shoe4 = new Product(name: "nike hoops 3.0", price: 50, currency: "&euro;");
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
