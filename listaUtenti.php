<!doctype html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
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
if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
    exit();
}
//Check if Utente is Administrator
if (!isAmministratore($_SESSION['Utente'])) {
    $_SESSION['log'] = "Non hai i permessi per accedere a questa pagina";
    header("Location: login.php");
    exit();
}
$utenti = getUtenti();
?>
<?php include "navBar.php" ?>
<div class="container mt-3">
    <?php
    if (isset($_SESSION['log'])) {
        echo "<div class='alert alert-primary' role='alert'>
        <strong>Attenzione!</strong> " . $_SESSION['log'] . "
    </div>";
        unset($_SESSION['log']);
    }
    ?>
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
                    <th scope="col">Lock</th>
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
                    $attivo = isAttivo($utente);
                    $id = $utente->getIdUtente();

                    echo "<tr>";
                    echo "<th scope=\"row\">$id</th>";
                    echo "<td>$nome</td>";
                    echo "<td>$cognome</td>";
                    echo "<td>$username</td>";
                    echo "<td>$email</td>";
                    echo "<td>$cellulare</td>";
                    echo "<td>$tipoUtente</td>";
                    echo "<td><form action='modificaUtente.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='listaUtenti.php'>
                            <button type='submit' class='btn btn-primary'><i class='bi bi-pencil'></i></button>
                        </form></td>";
                    echo "<td><form action='verificaCambioStatoUtente.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='listaUtenti.php'>
                            <input type='hidden' name='attivo' value='" . (($attivo) ? 0 : 1) . "'>";
                    echo "<button type='submit' class='btn btn-warning'><i class='" . (($attivo) ? "bi bi-lock" : "bi bi-unlock") . "'></i></button></form></td>";
                    echo "<td><form action='verificaEliminaUtente.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='listaUtenti.php'>
                            <button type='submit' class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td>";
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