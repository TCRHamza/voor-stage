<?php
// auteur: Hamza vdb
// functie: algemene functies tbv hergebruik
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3dplus";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Stel de PDO-foutmodus in op exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Verbonden met de database";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
        return null;
    }
}


function GetData($table){
    // Maak verbinding met de database
    $conn = ConnectDb();

    // Selecteer gegevens uit de opgegeven tabel met behulp van een prepared statement
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function GetFilm($filmid){
    // Maak verbinding met de database
    $conn = ConnectDb();

    // Selecteer gegevens uit de opgegeven tabel met behulp van een prepared statement
    $query = $conn->prepare("SELECT * FROM film WHERE filmid = ?");
    $query->execute([$filmid]);
    $result = $query->fetch();

    return $result;
}

function OvzFilms(){
    // Haal alle filmrecords op uit de tabel
    $result = GetData("film");

    // Print de tabel
    PrintTable($result);
}

function Ovzfilm(){
    // Haal alle brouwerrecords op uit de tabel
    $result = GetData("film");

    // Print de tabel
    PrintTable($result);
}

function PrintTable($result){
    // Genereer de HTML-tabel
    $table = "<table border='1px'>";

    // Print de koprij
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor='gray'>" . $header . "</th>";
    }
    $table .= "</tr>";

    // Print de gegevensrijen
    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";

    echo $table;
}

function crudFilms(){
    // Haal alle filmrecords op uit de tabel
    $result = GetData("film");

    // Print de tabel
    PrintcrudFilm($result);
}

function PrintcrudFilm($result){
    // Genereer de HTML-tabel
    $table = "<table border='1px'>";

    // Print de koprij
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor='gray'>" . $header . "</th>";
    }
    $table .= "<th>Actie</th>";
    $table .= "</tr>";

    // Print de gegevensrijen
    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "<td>
            <form method='post' action='delete_film.php?filmid=$row[filmid]'>
                <button name='wzg'>Wzg</button>
            </form>
        </td>";

        $table .= "<td><a href='delete_film.php?filmid=$row[filmid]'>verwijder</a></td>";

        $table .= "</tr>";
    }
    $table .= "</table>";

    echo $table;
}

function UpdateFilm($row){
    echo "Rij bijwerken<br>";

    try{
        // Maak verbinding met de database
        $conn = ConnectDb();

        // Werk de gegevens bij in de opgegeven tabel met behulp van een prepared statement
        $sql = "UPDATE film
        SET
        filmnaam = :filmnaam,
        genreid = :genreid,
        releasejaar = :releasejaar,
        'regisseur = :'regisseur,
            landherkomst = :landherkomst
        WHERE filmid = :filmid";

        $query = $conn->prepare($sql);
        $query->execute([
            'filmnaam' => $row['filmnaam'],
            'genreid' => $row['genreid'],
            'releasejaar' => $row['releasejaar'],
            'regisseur' => $row['regisseur'],
            'landherkomst	' => $row['landherkomst	'],
            'filmid' => $row['filmid']
            
        ]);
    }
    catch(PDOExpection $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
    }
}

function DeleteFilm($filmid){
    echo "Rij verwijderen<br>";

    try{
        // Maak verbinding met de database
        $conn = ConnectDb();

        // Verwijder de rij uit de tabel met behulp van een prepared statement
        $sql = "DELETE FROM film WHERE filmid = ?";
        $query = $conn->prepare($sql);
        $query->execute([$filmid]);
    }
    catch(PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
    }
}

function dropDown($label, $data){
    $txt = "
    <label for='$label'>Kies een $label:</label>
    <select name='$label' id='$label'>";
    foreach($data as $row){
        if (isset($row['naam'])) {
            $txt .= "<option value='$row[filmid]'>$row[naam]</option>";
        } else {
            $txt .= "<option value='$row[filmid]'>Onbekende naam</option>";
        }
    }
    $txt .= "</select>";

    echo $txt;
}

function Film(){
    // Haal alle brouwerrecords op uit de tabel
    $result = GetData("film");

    // Print de tabel
    PrintCrudfilm($result);
}

function Printfilm($result){
    // Genereer de HTML-tabel
    $table = "<table border='1px'>";

    // Print de koprij
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor='gray'>" . $header . "</th>";
    }
    $table .= "<th>Actie</th>";
    $table .= "</tr>";

    // Print de gegevensrijen
    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "<td>
            <form method='post' action='delete_film.php?filmcode=$row[filmcode]'>
                <button name='wzg'>Wzg</button>
            </form>
        </td>";

        $table .= "<td><a href='delete_film.php?filmcode=$row[filmcode]'>verwijder</a></td>";

        $table .= "</tr>";
    }
    $table .= "</table>";

    echo $table;
}
?>
