<?php
declare(strict_types=1);

require_once 'opdr10.php';

$movie1= new Movie( name:"avatar", genre: 'fantasy',  seen: 5);

echo $movie1->getName();

var_dump($movie1);