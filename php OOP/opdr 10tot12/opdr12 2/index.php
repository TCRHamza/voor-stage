<?php 
require_once 'ListenList.php';
require_once 'music.php';

$kees = new ListenList();

$kees->addMusic("hallo");

$kees->addMusic("pindas");

$music2 = new music("ABC", "House", 2);
$kees->addMusic($music2);

$music3 = new Music(name:"abc", genre: "house", listen: 5);
$music4 = new Music("DEF", "Rock", 3);
$kees->addMusic($music3);
$kees->addMusic($music4);

echo "ListenList met objecten:";
var_dump($kees->music);
?>