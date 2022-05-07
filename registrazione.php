<?php ?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrazione</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['log'])) {
    echo "<h3>" . $_SESSION['log'] . "</h3>";
    unset($_SESSION['log']);
}
?>
<form method="post" action="Controllers/verificaRegistrazione.php" id="formBello">
    <div>
        <label>Nome e Cognome</label>
        <input name="nome" type="text" required>
        <input name="cognome" type="text" required>
    </div>
    <div>
        <label>Email</label>
        <input name="email" type="email" required>
    </div>
    <div>
        <label>Username</label>
        <input name="username" type="text" required>
    </div>
    <div>
        <label>Password</label>
        <input id="p1" name="password" type="password" required>
        <input id="p2" type="password" required>
    </div>
    <div>
        <label>Cellulare</label>
        <input name="cellulare" type="text" required>
    </div>

    <div>
        <button type="submit" id="btn">Registrati</button>
    </div>
</form>
</body>
<script>
    let uguali = false;

    const handler = function (e) {
        let p1 = document.getElementById("p1");
        let p2 = document.getElementById("p2");

        if (verificaPass(p1, p2)) {
            console.log("non valida");
            return;
        }

        if (p1.value === p2.value) {
            uguali = true;
        } else {
            uguali = false;
        }
    }

    const handlerBTN = function (e) {
        console.log("Bottone cliccato");

        if (uguali) {
            let objForm = document.getElementById("formBello");

            if (required()) objForm.submit();
        } else {
            console.log("le password non sono uguali quindi niente");
        }
    }

    let p1 = document.getElementById("p1");
    let p2 = document.getElementById("p2");

    p1.addEventListener("input", handler);
    p1.addEventListener("propertychange", handler);

    p2.addEventListener("input", handler);
    p2.addEventListener("propertychange", handler);

    document.getElementById("btn").addEventListener("click", handlerBTN); //aggiungo l'eventHandler al bottone
                                                                          //che gestirà il click

    function required() {
        let objs = document.getElementsByTagName("input");

        for (let i = 0; i < objs.length; i++) {
            if (objs[i].value.length < 1) return false;
        }

        return true;
    }

    function verificaPass(p1, p2) { //ritorna false se la password è valida
        if (p1.value.length < 8 || p2.value.length < 8) return true; //se la pass ha meno di 8 caratteri la dichiaro non valida

        return false;
    }
</script>
</html>