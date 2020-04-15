<?php session_start(); ?>
<!DOCTYPE html>
    <html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
            <form action="form06_redirect.php" method="POST">
                id_prac <input type="text" name="id_prac">
                nazwisko <input type="text" name="nazwisko">
                <input type="submit" value="Wstaw">
                <input type="reset" value="Wyczysc">
            </form>
            <br><a href="form06_get.php">Wyświetl listę wszytskich pracowników</a><br><br>
            <?php 
                if(isset($_SESSION["result"])){
                    if($_SESSION["result"] == 0){
                        echo "<h2>Naruszono klucz główny</h2>";
                    }
                    else if($_SESSION["result"] == -1){
                        echo "<h2>Podano błędne lub niekompletne dane</h2>";
                    }
                }
                $_SESSION["result"] = null;
            ?>
    </body>
</html>