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

            <div>
                <label>Password</label>
                <input id="p1" name="passwd" type="password" required>
                <input id="p2" type="password" required>
            </div>
        </form>
    </body>
    <script>
        function event(){
            let p1 = document.getElementById("p1");
            let p2 = document.getElementById("p2");

            p1.addEventListener("input", controlla);
            p1.addEventListener("propertychange", controlla);

            p2.addEventListener("input", controlla);
            p2.addEventListener("propertychange", controlla);
        }

        function controlla(){
            let p1 = document.getElementById("p1");
            let p2 = document.getElementById("p2");

            if(p1.value === p2.value){
                console.log("sono ugualiiii");
            }else{
                console.log("Sono diverse");
            }
        }
    </script>
</html>