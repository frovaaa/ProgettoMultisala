<?php
require_once "queryCollection.php";
session_start();

if (isset($_POST['id'])) {
    $idCinema = $_POST['id'];
    if(deleteCinema($idCinema)) $_SESSION['log'] = "Cinema eliminato con successo";
    else $_SESSION['log'] = "Errore nell'eliminazione del cinema";
} else $_SESSION['log'] = "Errore nell'eliminazione del cinema";

header("Location: gestioneCinemas.php");
exit();