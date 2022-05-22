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
<!--Edit profile-->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Modifica profilo</h3>
                </div>
                <div class="card-body">
                    <form action="verificaModificaUtente.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="<?php echo $utente->getNome() ?>">
                        </div>
                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" class="form-control" id="cognome" name="cognome"
                                   value="<?php echo $utente->getCognome() ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   value="<?php echo $utente->getUsername() ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?php echo $utente->getEmail() ?>">
                        </div>
                        <div class="form-group">
                            <label for="cellulare">Cellulare</label>
                            <input type="text" class="form-control" id="cellulare" name="cellulare"
                                   value="<?php echo $utente->getCellulare() ?>">
                        </div>
                        <div class="form-group">
                            <label for="immagineProfilo">Immagine Profilo</label>
                            <input type="text" class="form-control" id="immagineProfilo" name="immagineProfilo"
                                   value="<?php echo $utente->getImmagineProfilo() ?>">
                        </div>
                        <input type="hidden" name="sourceModifica" value="1">
                        <button type="submit" class="btn btn-primary mt-3">Salva</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>