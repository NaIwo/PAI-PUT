<?php session_start(); 
require("./funkcje.php");
if(isSet($_POST["zaloguj"])) {
    //echo "Przesłany login: " . test_input($_POST["login"]);
    //echo "Przesłane hasło: " . test_input($_POST["password"]);
    $_SESSION["zalogowany"] = 0;
    if( test_input($_POST["login"]) == $osoba1->login && test_input($_POST["password"]) == $osoba1->haslo)
    {
        $_SESSION["zalogowanyImie"] = $osoba1->imieNazwisko;
        $_SESSION["zalogowany"] = 1;
        header("Location: user.php");
    }
    if( test_input($_POST["login"]) == $osoba2->login && test_input($_POST["password"]) == $osoba2->haslo)
    {
        $_SESSION["zalogowanyImie"] = $osoba2->imieNazwisko;
        $_SESSION["zalogowany"] = 1;
        header("Location: user.php");
    }
    if($_SESSION["zalogowany"] == 1)
        header("Location: user.php");
    else
    header("Location: index.php");
}
?>