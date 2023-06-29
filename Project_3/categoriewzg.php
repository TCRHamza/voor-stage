<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<!-- Hoofd-HTML-code -->
<main class="cat_wzg_main">
<div class="cat_wzg_h1_cont">
    <h1>Een categorie wijzigen</h1>
</div>

<!-- Hoofd-PHP-code -->
<?php
// Maak verbinding met de database
function connectdb($id) {
    try {
        $db = new PDO("mysql:host=localhost;dbname=acces", "root", "");
        getcategory($db, $id);
        return $db;
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->GetMessage());
    }
}

// Haal categoriegegevens op uit de database
function getcategory($db, $id) {
    if (isset($id)) {
        $query = $db->prepare("SELECT categorienaam FROM categorieën WHERE idcategorie = $id");
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        printform($result, $id);
    }
}

// Gegevens in formulier printen
function printform($result, $id) {
    $name = $result[0]["categorienaam"];
    $form = "<div class='cat_wzg_form'><form method='POST'>";

    $form .= "<label for='cat_id'>Categorie ID NIET AANPASSEN!: </label>";
    $form .= "<input type=''text' name='cat_id' value='$id'>";
    $form .= "<br>";

    $form .= "<label for='cat_name'>Categorie naam: </label>";
    $form .= "<input type=''text' name='cat_name' value='$name'>";
    $form .= "<br><br>";

    $form .= "<input type='submit' name='submit_btn' value='Wijzigen'>";
    $form .= " <input type='submit' name='goback' value='Keer terug'>";

    $form .= "</form></div>";
    echo $form;
}

function updatedb() {
    $db = new PDO("mysql:host=localhost;dbname=acces", "root", "");
    $id = $_POST["cat_id"];
    $name = $_POST["cat_name"];
    $update = $db->prepare("UPDATE `categorieën` SET `categorienaam` = '$name' WHERE `categorieën`.`idcategorie` = $id;");
    $update->execute();
    slep();
}

function slep() {
    header("location: categoriecrud.php");
}

// Controleer of verzenden btn is ingedrukt
if (isset($_POST["submit_btn"])) {
    updatedb();
}

// Start de code
if (isset($_POST["wzg_btn"])) {
    $id = $_POST["wzg_btn"];
    connectdb($id);
}
else if(isset($_POST["goback"])) {
    header("location: categoriecrud.php");
}

?>




