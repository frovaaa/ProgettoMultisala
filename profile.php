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
    <title>Profilo</title>
</head>
<body>
<?php
include "queryCollection.php";
session_start();
if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Pagina riservata a utenti autenticati";
    header("Location: login.php");
    exit();
}
$utente = $_SESSION['Utente'];
?>
<?php include "navBar.php" ?>
<div class="container mt-3">
    <!--Show alert in session-->
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
            <div class="card">
                <div class="card-header">
                    <h3>Profilo Utente</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo $utente->getImmagineProfilo(); ?>" class="img-fluid"
                                 alt="Immagine profilo non disponibile" width="256" height="256">
                        </div>
                        <div class="col-md-8">
                            <h1><?php echo $utente->getNome(); ?></h1>
                            <h2><?php echo $utente->getCognome(); ?></h2>
                            <h3><?php echo $utente->getEmail(); ?></h3>
                            <h3><?php echo getRuoloAsString($utente->getIdfRuolo()); ?></h3>
                            <!--Bottone modifica utente-->
                            <a href="modificaProfilo.php" class="btn btn-primary btn-lg btn-block">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
