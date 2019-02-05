<html>
<head>
    <title>program10</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Podaj dwie liczby, tak żeby tworzyły zakres z którego zostanie obliczona suma tych liczb:</p>

<form action="zadanie10.php" method="post">
    <input name="pierwsza" type="text">
    <input name="druga" type="text">
    <input type="submit" />
</form>

<?php

$min = @$_POST['pierwsza'];
$max = @$_POST['druga'];

zakres($min, $max);

function zakres($min, $max)
{
    $indeks = 0;
    $suma = 0;

    for($liczba = $min; $liczba <= $max; $liczba++)
    {
        $tablica[$indeks] = $liczba;
        print("Indeks[$indeks] =   ");
        $indeks++;
        print_r($liczba);
        print("<br/>");
    }

    $indeks = 0;
    for ($i = $min; $i <= $max; $i++)
    {
        $suma = $suma + $tablica[$indeks];
        $indeks++;
    }
    print("Suma:");
    print_r($suma);
}

?>

</body>
</html>