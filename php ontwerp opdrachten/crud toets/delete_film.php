<?php
    echo "<h1>Delete film</h1>";
    require_once('functions_film.php');

    // Test of er op de verwijder-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_verw'])){
        DeleteFilm($_POST['filmid']);
        echo "De rij met filmid" . $_POST['filmid'] . " is verwijderd.";
    }

    if(isset($_GET['filmid'])){
        echo "verwijderen<br>";
        // Haal alle info van de betreffende filmid $_GET['filmid']
        $filmid = $_GET['filmid'];
        $row = GetFilm($filmid);
        echo "filmid: " . $row['filmid'] . "<br>";
        echo "filmnaam: " . $row['filmnaam'] . "<br>";
        echo "genreid: " . $row['genreid'] . "<br>";
        echo "releasejaar: " . $row['releasejaar'] . "<br>";
        echo "regisseur: " . $row['regisseur'] . "<br>";
        echo "landherkomst: " . $row['landherkomst'] . "<br>";
        echo "duur: " . $row['duur'] . "<br>";
    }
?>

<form action="" method="POST">
    <input type="hidden" name="filmid" value="<?php echo $row['filmid']; ?>">
    <input type="submit" name="btn_verw" value="Verwijder">
</form>

