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
    <title>Lista Cinema</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();

if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
}

$cinemaList = getAllCinemas();
?>
<!--Cinema's list-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista Cinema</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Proprietario</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($cinemaList as $cinema) {
                    $nome = $cinema->getNome();
                    $provincia = $cinema->getProvincia();
                    $telefono = $cinema->getTelefono();
                    $email = $cinema->getEmail();
                    $idCinema = $cinema->getIdCinema();
                    $direttore = getUtenteOfCinemaByRole($idCinema, 3)->getCognome();
                    echo "<tr>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $provincia . "</td>";
                    echo "<td>" . $telefono . "</td>";
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $direttore . "</td>";
                    echo "<td>";
                    echo "<a href='cinema.php?id=" . $idCinema . "' class='btn btn-primary'>Visualizza</a>";
                    echo "<a href='modificaCinema.php?id=" . $idCinema . "' class='btn btn-primary'>Modifica</a>";
                    echo "<a href='eliminaCinema.php?id=" . $idCinema . "' class='btn btn-primary'>Elimina</a>";
                    echo "</td>";
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