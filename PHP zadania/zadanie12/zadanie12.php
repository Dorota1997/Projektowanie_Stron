<html>
<head>
    <title>program12</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Podaj dwie liczby, które chcesz przez siebie podzielić:</p>

<form action="zadanie12.php" method="post">
    <input name="pierwsza" type="text">
    <input name="druga" type="text">
    <input type="submit" />
</form>

<?php

$a = @$_POST['pierwsza'];
$b = @$_POST['druga'];

function dzielenie($a, $b)
{
    if ($b == 0)
        throw new Exception("Dzielenie przez zero!");

    return $a /  $b;
}

    $wynik = 0;
    try
    {
        $wynik = dzielenie($a, $b);
        print("Wynik: $wynik");
    }
    catch (Exception $e)
    {
        print($e->getMessage());
    }

?>

</body>
</html>