<?php
declare(strict_types=1);

require_once 'opdr12.php';
require_once 'Watchlist.php';

$piet = new Watchlist();

$movie1= new Movie( name:"avatar", genre: 'fantasy',  seen: 5);
$movie2 = new movie (name: "pirates", genre:"fantasy", seen:1);

$piet->addmovie($movie1);
$piet->addmovie($movie2);

echo $movie1->getName();

var_dump($piet);
?>