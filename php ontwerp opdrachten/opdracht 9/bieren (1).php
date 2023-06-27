<html>
    <style type= "text/css">
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
            width: 100px
        }

    </style>
<?php 
try {
$db = new PDO ("mysql:host=localhost;dbname=bieren", "root", "");

$query = $db->prepare("SELECT * FROM bier");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    foreach ($result as $data) {
     echo "<tr>";
        echo "<td>" , $data ["naam"];  "</td>";
        echo "<td>" , $data ["alcohol"];  "</td>";
        echo "<td>" , $data ["bier code"];  "</td>";
     echo "</tr>";
    }
    
    echo "</table>";
} catch(PDOException $e) {
    die("Error!: " . $e->message());
    }

?>
</html>

