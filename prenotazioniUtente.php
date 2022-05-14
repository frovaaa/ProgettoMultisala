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
include "queryCollection.php";
session_start();
$listaPrenotazioni = getPrenotazioniByIdUtente($_SESSION['Utente']->getIdUtente());
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>N.Prenotazione</th>
        <th>Posto</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($listaPrenotazioni as $prenotazione) {
        $codicePrenotazione = $prenotazione->getCodice();
        $posto = getPostoById($prenotazione->getIdfPosto());
        $posPosto = $posto->getRiga().'-'.$posto->getColonna();
        echo "<tr>";
        echo "<td>$codicePrenotazione</td>";
        echo "<td>$posPosto</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>


</body>
</html>