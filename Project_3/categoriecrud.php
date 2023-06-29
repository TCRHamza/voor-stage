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
<main class="cat_main">
    <div class="cat_h1_container">
        <h1 id="cat_h1">Categorieën overzicht</h1>
    </div>
    <div class="cat_toevoeg_btn_container">
        <form action="categorietoevoegen.php">
            <input type="submit" name="sub" value="Categorie Toevoegen!" id="cat_toevoeg_btn">
        </form>
    </div>


<!-- Main PHP code -->
<?php
// Maak verbinding met de database
function connectdb() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=acces", "root", "");
        getdata($db);
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->GetMessage());
    }
}


// Haal categoriegegevens op uit de database
function getdata($db) {
    $query = $db->prepare("SELECT idcategorie, categorienaam AS 'Categorie' FROM categorieën");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    printdata($result);
}

// Universele afdrukbare tafel
function printdata($result) {
    $table = "<div class='cat_table_container'><table class='cat_table'>";

    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $headers) {
        $table .= "<th>" . $headers . "</th>";
    }
    $table .= "<th></th><th></th>";
    $table .= "</tr>";

    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }

        // CRUD-knoppen wijzigen/verwijderen
        $table .= "<td>";
        $table .= "<form method='POST' action='categoriewzg.php'>
                    <button class='cat_table_btn' name='wzg_btn' value='$row[idcategorie]'>Wijzigen</button>
                   </form>";
        $table .= "</td>";
        $table .= "<td>";
        $table .= "<form method='POST' action='#'>
                    <button class='cat_table_btn' name='del_btn' value='$row[idcategorie]'>Verwijderen</button>
                   </form>";
        $table .= "</td>";

        $table .= "</tr>";
    }

    $table .= "</table></div>";
    echo $table;
}

//De functie begint door de waarde van de parameter del_btn op te halen uit de $_POST superglobal array en deze toe te wijzen aan de variabele $id.
function deletecat() {
    $id = $_POST["del_btn"];
    $db = new PDO("mysql:host=localhost;dbname=acces", "root", "");
//Er wordt een SQL-query voorbereid om een rij te verwijderen uit de tabel categorieën waar de kolom idcategorie overeenkomt met de waarde van $id.
    $mysqlquery = $db->prepare("DELETE FROM `categorieën` WHERE `categorieën`.`idcategorie` = $id");
    $mysqlquery->execute();
    echo"<script type='text/javascript'>alert('Categorie verwijdert!');</script>";
}

if (isset($_POST["del_btn"])) {
    deletecat();
}

$db = connectdb();

?>
</main>



