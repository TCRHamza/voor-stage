<?php

require_once 'music.php';

$music1= new music( Bach:'Bach', genre:'Klassiek', listen:3);

echo $music1->getname();

var_dump($music1);
