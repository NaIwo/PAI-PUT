<?php session_start(); ?>
<!DOCTYPE html>
    <html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <?php
        if(isset($_SESSION["result"])){
            if($_SESSION["result"] == 1) {
                echo "<h3>Zakończono sukcesem</h3><br>";
                $_SESSION["result"] = null;
            }
        }
        ?>
        <h3>Dane tabeli: </h3><br>
            <?php 
                $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
            
                if (!$link) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
                $sql = "SELECT * FROM pracownicy";
                $result = $link->query($sql);
                foreach ($result as $v) {
                    echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
                }

                $result->free();
                $link->close();
            ?>
            <br><a href="form06_post.php">Dodaj nowego użytkownika</a><br><br>
    </body>
</html>