<?php
session_start();

$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
$username = trim($_POST['username']);
$nome = trim($_POST['nome']);
$cognome = trim($_POST['cognome']);
$email = trim($_POST['email']);
$cellulare = trim($_POST['cellulare']);

$connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
//TODO: Da cambiare il IDFRuolo
$query = "INSERT INTO Utente (IDFRuolo, Nome, Cognome, Username, Password, Email, Cellulare) VALUES (1, '$nome', '$cognome', '$username', '$pass', '$email', '$cellulare')";

echo $query;

$result = $connection->query($query);


// definisco mittente e destinatario della mail
$nome_mittente = "Cinema Multisala";
$mail_mittente = "cinema@multisala.it";
$mail_destinatario = $_POST['Email'];
// definisco il subject ed il body della mail
$mail_oggetto = "Conferma Registrazione";

//Corpo della mail
$mail_corpo = <<<HTML
<html>
<head>
<title>Conferma registrazione</title>
</head>
<body>
Il tuo account e' stato creato con successo!! Il tuo nome utente è <b>$username</b>
</body>
</html>
HTML;
// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " . $nome_mittente . " <" . $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " . $mail_mittente . "\r\n";

// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
// Content-type e charset (necessarie per i contenuti in HTML)
$mail_headers .= "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=iso-8859-1";
//mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers);    //Mando la mail

$_SESSION["log"] = "Registrazione avvenuta con successo!!";

header("Location: login.php");
exit();