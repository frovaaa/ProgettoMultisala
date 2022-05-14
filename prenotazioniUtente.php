<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserimento Film</title>
</head>
<body>
<?php
require_once "../queryCollection.php";
session_start();
$listaPrenotazioni = getPrenotazioniByIdUtente($_SESSION['Utente']->getIdUtente());

?>

<table class="table table-striped">

</table>

</body>
</html>