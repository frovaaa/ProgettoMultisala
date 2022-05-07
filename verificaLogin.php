<?php
session_start();

$userOrEmail = trim($_POST['usernameOrEmail']);
$pass = trim($_POST['password']);
$isEmail = ((strpos($userOrEmail, '@') != false));

$connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

$query = "SELECT * FROM Utente";
$data = $connection->query($query);

if ($data->num_rows > 0) {
    while ($riga = $data->fetch_assoc()) {
        $controlloMail = strcmp($userOrEmail, (($isEmail) ? $riga['Email'] : $riga['Username'])) == 0;
        $controlloPass = password_verify($pass, $riga['Password']);

        if ($controlloMail && $controlloPass) {

            if (isset($_POST['rememberMe'])) {
                setcookie("rememberMe", $riga['IDUtente'], strtotime("+1 week"));
            }


            $_SESSION['Username'] = $userOrEmail;
            $_SESSION['IDUtente'] = $riga['IDUtente'];
            $_SESSION['IDFRuolo'] = $riga['IDFRuolo'];

            if (isset($_SESSION['redirect'])) header("Location:" . $_SESSION['redirect']);
            else header("Location:homepage.php");
            exit();
        }
    }

    $_SESSION['log'] = "Credenziali errate!";
    header("Location:login.php");
    exit();
} else {
    echo("<h3>Non esistono dati nella tabella</h3>");
}