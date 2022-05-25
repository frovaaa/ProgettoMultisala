<?php
    include "queryCollection.php";
    session_start();

    if(isset($_SESSION["Utente"])) $utente = $_SESSION["Utente"];
    else header("Location: login.php");

    $immagine = $_FILES["imgCaricata"]["tmp_name"];
    $newProfile = "profileImages/" . $utente->getIDUtente() . ".png";

    if(copy($immagine, $newProfile)){
        $_SESSION["log"] = "Immagine modificata correttamente!";
        $utente->setImmagineProfilo($newProfile);

        editUtente($utente->getIDUtente(), $utente);
    }else{
        $_SESSION["log"] = "Salvataggio fallito";
    }

    header("Location: profile.php");
?>