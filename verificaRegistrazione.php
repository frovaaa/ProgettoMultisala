<?php
require_once "queryCollection.php";
session_start();

$newUtente = new Utente();

$newUtente->setIdfRuolo(1);
$newUtente->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
$newUtente->setUsername($_POST['username']);
$newUtente->setNome($_POST['nome']);
$newUtente->setCognome($_POST['cognome']);
$newUtente->setEmail($_POST['email']);
$newUtente->setCellulare($_POST['cellulare']);
$newUtente->setImmagineProfilo("Images/blankProfile");

$_SESSION["log"] = (insertUtente($newUtente)) ? "Registrazione avvenuta con successo!!" : "Registrazione fallita :(";

#region SEND EMAIL
// definisco mittente e destinatario della mail
$nome_mittente = "Cinema Multisala";
$mail_mittente = "cinema@multisala.it";
$mail_destinatario = $newUtente->getEmail();
// definisco il subject ed il body della mail
$mail_oggetto = "Conferma Registrazione";

//Corpo della mail
$mail_corpo = '
<html>
<head>
<title>Conferma registrazione</title>
</head>
<body>
Il tuo account è stato creato con successo!! Il tuo nome utente è <b>'.  $newUtente->getUsername() .'</b> <br>
Puoi accedere al tuo account attraverso questo <a href="http://87.250.73.23/html/FrovaEsercizi/ProgettoMultisala/login.php">link</a>
</body> 
</html> ';

// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " . $nome_mittente . " <" . $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " . $mail_mittente . "\r\n";

// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
// Content-type e charset (necessarie per i contenuti in HTML)
$mail_headers .= "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=iso-8859-1";
mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers);    //Mando la mail   TODO: Abilitare --> abilitato ma non ho capito perché fosse disattivato

#endregion

header("Location: login.php");
exit();