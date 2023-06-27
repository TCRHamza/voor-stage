<?php

function ConnectDb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully ";
        return $conn;


        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
}


function GetData($table) {
    // Connect databases
    $conn = ConnectDb();

    // Select data uit de opgegeven tables
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function CrudBieren() {
    // Haal alle bier record uit de tabel.
    $result = GetData("bier");
    
    // Print table.
    echo "<a href=''>Toevoegen nieuwe bier.</a>";

    echo "<table border='1'>" . 
            "<tr>" . 
                "<th>" . "Biercode: " . "</th>" .
                "<th>" . "Biernaam: " . "</th>" .
                "<th>" . "Alcohol percentage:" . "</th>" .
                "<th>" . "wijzig:" . "</th>" .
                "<th>" . "verwijder:" . "</th>" .
            "</tr>";

    foreach ($result as $data) {

        echo "<tr>" .
                "<td>" . $data['biercode'] . "</td>" .
                "<td>" . $data['naam'] . "</td>" . 
                "<td>" . $data['alcohol'] . "</td>" . 
                "<td>" . "<form method='post' action='update_bier.php?biercode=[biercode]'>" . 
                
                "<button name='wijzig'>Wijzig.</button>" . "</form>" . 

                $table = "<a href='delete_bier.php?biercode=[biercode]'>" .  
                
                "<button name='verwijderen'>Verwijderen.</button>" . "</a>" . "</td>" .
            "</tr>";
    }
}

?>  