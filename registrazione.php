<?php ?>

<html>
    <head>
        <title>Registrazione</title>
    </head>
    <body>
        <form method="post" action="">
            <div>
                <label>Nome e Cognome</label>
                <input name="nome" type="text" required>
                <input name="cognome" type="text" required>
            </div>
            <div>
                <label>Email</label>
                <input name="mail" type="email" required>
            </div>
            <div>
                <label>Username</label>
                <input name="username" type="text" required>
            </div>

            <div id="passwdControlla">
                <label>Password</label>
                <input name="passwd" type="password" required onchange="controlla()">
                <input type="password" required onchange="controlla()">
            </div>
        </form>
    </body>

<script>
    function controlla(){
        let obj = document.getElementById("passwdControlla");
    }
</script>
</html>