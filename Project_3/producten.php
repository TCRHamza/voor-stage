<?php
 include("Menu.php"); 


$connect = mysqli_connect("localhost", "root", "", "acces");

// Controleer of het zoekformulier is verstuurd
if(isset($_POST['search']))
{
    // Haal de ingevoerde zoekterm op
    $valueToSearch = mysqli_real_escape_string($connect, $_POST['valueToSearch']);
    
    // Maak de zoekopdracht
    $query = "SELECT * FROM `producten` WHERE `productnaam` LIKE '%".$valueToSearch."%'";
    
    // Voer de zoekopdracht uit
    $search_result = mysqli_query($connect, $query);
}
else {
    // Als het zoekformulier niet is verstuurd, haal dan alle resultaten op
    $query = "SELECT * FROM `producten`";
    $search_result = mysqli_query($connect, $query);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 2px solid black;
                width: 60%;
                height: 40px
            }
        </style>
    </head>
    <body>
        <main class="Producten">
        <form method="post" action="">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
        </form>
        
        <table>
            <tr>
                <th>Id</th>
                <th>Productnaam</th>
                <th>categorieid</th>
                <th>Leverancier</th>
            </tr>
            
            <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['idproduct'];?></td>
                    <td><?php echo $row['productnaam'];?></td>
                    <td><?php echo $row['categorieën_idcategorie'];?></td>
                    <td><?php echo $row['leveranciers_idleverancier'];?></td>
                </tr>
            <?php endwhile;?>
        </table>
            </main>
            <h2>opladers prijzen 10 euro <br>
            screenprotectors 12,99 euro <br>
            telefoon hoesjes kosten 15,99 euro <br>
            popsocket 4,99 euro
            </h2>
    </body>
    <footer class="footer1">
        <h1>contacteer ons hier</h1> <br>
        <h2>emailadres: 9018415@student.tcrmbo.nl <br>
            telefoonnummer: 0624660824
        </h2>
    </footer>
    </html>