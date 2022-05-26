<?php
require_once "queryCollection.php";
session_start();

if (isset($_POST['idPrenotazione'])) {
    $idPrenotazione = $_POST['idPrenotazione'];
    deletePrenotazione($idPrenotazione);
    $_SESSION['log'] = "Prenotazione eliminata con successo";
} else $_SESSION['log'] = "Errore nell'eliminazione della prenotazione";

header("Location: listaPrenotazioni.php");
exit();