<?php
    include "queryCollection.php";
    session_start();
    $utente = null;

    if(isset($_SESSION["Utente"])){ $utente = $_SESSION["Utente"]; }

    if($utente == null) http_redirect("hompage.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <link rel="stylesheet" type="text/css" href="CSS/profile.css">

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile</title>
    </head>
    <body>
    <?php include "navBar.php" ?>
    <main>
        <div id="sezioneProfilo">

        </div>
        <div id="sezionePrenotazioni">

        </div>
    </main>
    </body>
</html>