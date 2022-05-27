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
    <title>Modifica Utente</title>
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
if (!isAmministratore($_SESSION['Utente'])) {
    $_SESSION['log'] = "Non sei autorizzato a visualizzare questa pagina";
    header("Location: homepage.php");
    exit();
}
$utenteModifica = null;
if (isset($_POST['id'])) $utenteModifica = getUtenteById($_POST['id']);
else {
    $_SESSION['log'] = "Devi selezionare un utente da modificare";
    header("Location: listaUtenti.php");
    exit();
}
?>
<?php include "navBar.php"?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Modifica Utente</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="verificaModificaUtente.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?php echo $utenteModifica->getNome(); ?>">
                </div>
                <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome"
                           value="<?php echo $utenteModifica->getCognome(); ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="<?php echo $utenteModifica->getUsername(); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php echo $utenteModifica->getEmail(); ?>">
                </div>
                <div class="form-group">
                    <label for="cellulare">Cellulare</label>
                    <input type="tel" class="form-control" id="cellulare" name="cellulare"
                           value="<?php echo $utenteModifica->getCellulare(); ?>">
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="password">Password</label>-->
<!--                    <input type="password" class="form-control" id="password" name="password"-->
<!--                           value="--><?php //echo $utenteModifica->getPassword(); ?><!--">-->
<!--                </div>-->
                <div class="form-group">
                    <label for="ruolo">Ruolo</label>
                    <select class="form-control" id="ruolo" name="ruolo">
                        <?php
                        $ruoli = getRuoli();
                        foreach ($ruoli as $ruolo) {
                            $idRuolo = $ruolo->getIdRuolo();
                            $nomeRuolo = $ruolo->getNome();
                            if ($utenteModifica->getIdfRuolo() == $idRuolo) {
                                echo "<option value='$idRuolo' selected>$nomeRuolo</option>";
                            } else {
                                echo "<option value='$idRuolo'>$nomeRuolo</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="attivo">Attivo</label>
                    <select class="form-control" id="attivo" name="attivo">
                        <?php
                        if (isAttivo($utenteModifica)) {
                            echo "<option value='1' selected>Si</option>";
                            echo "<option value='0'>No</option>";
                        } else {
                            echo "<option value='1'>Si</option>";
                            echo "<option value='0' selected>No</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $utenteModifica->getIdUtente(); ?>">
                <input type="hidden" name="sourceModifica" value="2">
                <button type="submit" class="btn btn-primary mt-3">Modifica</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>