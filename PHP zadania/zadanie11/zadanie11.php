<html>
<head>
    <title>program11</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Wpisz w podanej kolejności: imię, nazwisko, rok urodzenia</p>

<form action="zadanie11.php" method="post">
    <input name="pierwsza" type="text">
    <input name="druga" type="text">
    <input name="trzecia" type="text" >
    <input type="submit" />
</form>

<?php
$imie = @$_POST['pierwsza'];
$nazwisko = @$_POST['druga'];
$rok_urodzenia = @$_POST['trzecia'];

class Osoba
{
    public $imie;
    public $nazwisko;
    public $rok_urodzenia;
    public function wpisz($imie, $nazwisko, $rok_urodzenia)
    {
        print("<br/>Imie:   $imie");
        print("<br/>Nazwisko:   $nazwisko");
        print("<br/>Rok urodzenia:   $rok_urodzenia");
    }

    public function osiemnascie($rok_urodzenia)
    {
        $rok = date("Y");
        $wiek = $rok - $rok_urodzenia;
        print("<br>Wiek: $wiek");
        if($wiek < 18)
        {
            print("<br/>Osoba nie jest pełnoletnia");
        }
        else
        {
            print("<br/>Osoba jest pełnoletnia");
        }
    }

};



    $ktos = new Osoba();
    $ktos-> wpisz($imie, $nazwisko, $rok_urodzenia);
    $ktos->osiemnascie($rok_urodzenia);
?>

</body>
</html>