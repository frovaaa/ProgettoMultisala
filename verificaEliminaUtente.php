<?php
include "queryCollection.php";
session_start();

$id = ($_POST['id'] ?? null);
if ($id != null) $_SESSION['log'] = deleteUtente($id) ? "Utente eliminato con successo" : "Errore nella eliminazione dell'utenza";
else $_SESSION['log'] = "Errore nella eliminazione dell'utenza";

$redirect = ($_POST['redirect'] ?? "homepage.php");
header("Location: $redirect");
exit();