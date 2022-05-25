<?php
include "queryCollection.php";
session_start();

$id = ($_POST['id'] ?? null);
if ($id != null) $_SESSION['log'] = deleteFilm($id) ? "Film eliminato con successo" : "Errore nella eliminazione del film";
else $_SESSION['log'] = "Errore nella eliminazione del film";

$redirect = ($_POST['redirect'] ?? "homepage.php");
header("Location: $redirect");
exit();