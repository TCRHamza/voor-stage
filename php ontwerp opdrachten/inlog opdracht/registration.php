<?php
// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Fout bij de databaseverbinding: " . $e->getMessage();
}

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de waarden van het formulier
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    
    // Voer hier de nodige validatie uit op de ontvangen gegevens
    
    // Bereid de SQL-query voor
    $stmt = $conn->prepare("INSERT INTO username (username, password) VALUES (:username, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    
    // Voer de query uit
    try {
        $stmt->execute();
        echo "Bedankt voor het registreren, $naam!";
    } catch(PDOException $e) {
        echo "Fout bij het uitvoeren van de query: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registratieformulier</title>
</head>
<body>
    <h2>Registratieformulier</h2>
    <form method="POST" action="registratie.php">
        <label for="naam">username:</label>
        <input type="text" name="naam" id="naam" required><br><br>
        
        
        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>
        
        <input type="submit" value="Registreren">
    </form>
</body>
</html>
