<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inloggen</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include("menu.php")?>
<body>


    

   
    <div class="inlogform">
        <h1>INLOGGEN</h1>
        <form action="homepagina.php" method="post">
        <p>Gebruikersnaam</p>
        <input type="text" name="gebruiker" placeholder="Gebruikersnaam">
        <p>Wachtwoord</p>
        <input type="password" name="password" placeholder="Wachtwoord">
        <button onclick="location.href='producten.php'" type="button">login
        </button>
        <br>
    </div>


</body>
</html>

