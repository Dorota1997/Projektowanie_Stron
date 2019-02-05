<html>
<head>
    <title>program10</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
$plik = fopen("liczby.txt", "r");

// funkcja fseek ustawia pozycje wskaźnika, offset 0 oznacza że
// na poczatku pliku
fseek($plik, 0);

$indeks = 0;

while(!feof($plik))
{
    $zawartosc=fgets($plik);
    // zrzutowałam pobraną wartość jako liczbę całkowitą - bez tego sortowanie nie działało poprawnie tzn.
    // funkcja rsort sortowała ale tylko względem pierwszego znaku... Pamiętać!!!
    $tablica[$indeks] = (int) $zawartosc;
    $indeks++;
}

rsort($tablica);

$rozmiartab = count($tablica);
for($x = 0; $x < $rozmiartab; $x++)
{
    echo $tablica[$x];
    echo "<br>";
}

fclose($plik);
?>

</body>
</html>