<?php
session_start();

// sprawdzenie czy login i hasło nie sa ustawione, to przekieruj przeglądarkę do pliku index.php
if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
    header('Location: index.php');
    exit();
};

include 'database.php';

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$login=$_POST['login'];
$haslo=$_POST['haslo'];

$sql="SELECT * FROM log WHERE login='$login' AND haslo='$haslo'";

if ($rezultat=$pdo->query($sql))
{
    $ilu_userow=$rezultat->rowCount();
    echo $ilu_userow;
    if ($ilu_userow > 0)
    {
        $wiersz = $rezultat->fetch();

        $_SESSION['user']=$wiersz['login'];
        $_SESSION['zalogowany'] = true;
        unset($_SESSION['blad']);

        $rezultat->closeCursor();
        header('location: gra.php');
    }
    else {
        $_SESSION['blad'] = "Nieprawidlowy login lub haslo!";
        header('Location: index.php');
    }
}

Database::disconnect();
?>

