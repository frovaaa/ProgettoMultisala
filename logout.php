<?php
session_start();
if(isset($_SESSION['Utente'])){
    $utente = $_SESSION['Utente'];
    setcookie("rememberMe", $utente, strtotime("-1 day"));
    unset($_SESSION['Utente']);
    session_destroy();
}
header("Location: homepage.php");
exit();