<!doctype html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Pannello Amministratore</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();

if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
}
?>
<!-- Navigation -->
<?php include "navBar.php" ?>
<!-- Fine navbar -->


<!--Administrator Panel-->
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h1>Pannello Amministratore</h1>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h3>Utenti</h3>
                    <a href="listaUtenti.php" class="btn btn-success">Visualizza</a>
                </div>
                <div class="col-md-4">
                    <h3>Sedi</h3>
                    <a href="listaCinema.php" class="btn btn-success">Visualizza</a>
                </div>
                <div class="col-md-4">
                    <h3>Reportistica</h3>
                    <a href="categorie.php" class="btn btn-success">Visualizza</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>