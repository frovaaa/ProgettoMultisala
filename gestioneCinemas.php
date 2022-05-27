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
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

    <title>Gestione Sale</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();
if (!isAmministratore($_SESSION['Utente'])) {
    $_SESSION['log'] = "Non hai i permessi per accedere a questa pagina";
    header("Location: homepage.php");
    exit();
}

?>
<?php include "navBar.php"; ?>

<div class="container">
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
            <h1>Gestione Film</h1>
            <table class="table table-striped" id="tabellaCinemas">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Città</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cinemas = getAllCinemas();
                //Foreach film in films print data and option buttons
                foreach ($cinemas as $cinema) {
                    $id = $cinema->getIdCinema();
                    $nome = $cinema->getNome();
                    $citta = $cinema->getCitta();
                    $telefono = $cinema->getTelefono();
                    $email = $cinema->getEmail();

                    echo "<tr>";
                    echo "<td>$nome</td>";
                    echo "<td>$citta</td>";
                    echo "<td>$telefono</td>";
                    echo "<td>$email</td>";
                    echo "<td><form action='verificaEliminaCinema.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='gestioneCinemas.php'>
                            <button type='submit' class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        $('#tabellaCinemas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
            }
        });
    });
</script>

</body>
</html>