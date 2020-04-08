<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>

        <?php
            require_once("funkcje.php");

            if($_GET["utworzCookie"]) {
                setcookie("ciasteczko", "wartość", time() + $_GET["czas"] , "/");
                echo "Utworzono cookie<br>";
            }
        ?>

        <a href="index.php">Wstecz</a>
    </body>
</html>