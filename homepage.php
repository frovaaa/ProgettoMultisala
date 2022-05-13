<!doctype html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
</head>
<body>
<?php
include "queryCollection.php";
session_start();
$utente = null;

if (isset($_SESSION['Utente'])) {
    $utente = $_SESSION['Utente'];
    echo "<h1>Benvenuto " . $utente->getUsername() . "</h1>";
}
?>
    <header>
        <nav>
            <div>
                <div id="logo">
                    <img src="Images/logo.png">
                </div>

                <div id="list">
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="registrazione.php">Registrati</a></li>
                        <li><a href="#">Ciao</a></li>
                        <li><a href="#">Ciao</a></li>
                        <li><a href="#">Ciao</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<main>

</main>
</body>
</html>