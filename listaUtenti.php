<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Lista Utenti</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();
if(!isset($_SESSION['Utente'])){
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
    exit();
}
//Check if Utente is Administrator
if(!isAmministratore($_SESSION['Utente'])){
    $_SESSION['log'] = "Non hai i permessi per accedere a questa pagina";
    header("Location: login.php");
    exit();
}
$utenti = getUtenti();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista Utenti</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cellulare</th>
                    <th scope="col">Ruolo</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($utenti as $utente) {
                    $nome = $utente->getNome();
                    $cognome = $utente->getCognome();
                    $username = $utente->getUsername();
                    $email = $utente->getEmail();
                    $cellulare = $utente->getCellulare();
                    $tipoUtente = getRuoloAsString($utente->getIdfRuolo());
                    $id = $utente->getIdUtente();

                    echo "<tr>";
                    echo "<th scope=\"row\">$id</th>";
                    echo "<td>$nome</td>";
                    echo "<td>$cognome</td>";
                    echo "<td>$username</td>";
                    echo "<td>$email</td>";
                    echo "<td>$cellulare</td>";
                    echo "<td>$tipoUtente</td>";
                    echo "<td><a href=\"modificaUtente.php?id=$id\"><i class=\"bi bi-pencil\"></i></a></td>";
                    echo "<td><a href=\"eliminaUtente.php?id=$id\"><i class=\"bi bi-trash\"></i></a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>