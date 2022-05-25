<?php
include "queryCollection.php";
session_start();

$id = ($_POST['id'] ?? null);
$attivo = ($_POST['attivo'] ?? null);
if ($id != null && $attivo != null) {
    $attivo = $_POST['attivo'];
    $utente = getUtenteById($id);
    $utente->setAttivo($attivo);
    $_SESSION['log'] = editUtente($id, $utente) ? ("Utente " . (($attivo) ? "abilitato" : "disabilitato") . " con successo") : "Errore nella disabilitazione dell'utenza";
} else $_SESSION['log'] = "Errore nella disabilitazione dell'utenza";

$redirect = ($_POST['redirect'] ?? "homepage.php");
header("Location: $redirect");
exit();