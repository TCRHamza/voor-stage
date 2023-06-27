<?php

require_once 'movie.php';

$movie1= new Movie( '4', ['fantasy', 'sf' ], 5);

echo $movie1->getName();

var_dump($movie1);