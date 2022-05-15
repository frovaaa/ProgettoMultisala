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
<?php include "navBar.php" ?>
<main>
    <div>

    </div>
</main>
</body>
</html>