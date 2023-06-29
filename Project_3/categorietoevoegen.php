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
    


<!-- Main HTML code -->
<main class="cat_toe_main">
    <div class="cat_toe_cont">
        <h1 id="cat_toe_h1">Nieuwe categorieeën toevoegen!</h1>
    </div>

    <div id="cat_toe_form_cont">
        <form method="POST" action="#" class="cat_toe_form">
            <label for="cat_name">Categorie naam: </label>
            <br>
            <input type="text" name="cat_name">
            <br><br>
            <input type="submit" name="submit_btn" value="Categorie Toevoegen">
            <br><br>
            <input type="submit" name="goback" value="Keer terug">
        </form>
    </div>


<!-- connect ik database -->
<?php
function connectdb() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=acces", "root", "");
        return $db;
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->GetMessage());
    }
}

function pushdata($db) {
    $catname = readform();
    $query = $db->prepare("INSERT INTO `categorieën` (`categorienaam`) VALUES ('$catname');");
    $query->execute();
    echo"<script type='text/javascript'>alert('Categorie $catname is toegevoegd!');</script>";
}

function readform() {
    $catname = $_POST["cat_name"];
    return $catname;
}

if (isset($_POST["submit_btn"])) {
    $db = connectdb();
    pushdata($db);
}
else if (isset($_POST["goback"])) {
    header("location: categoriecrud.php");
}

?>


