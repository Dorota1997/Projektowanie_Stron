<html>
<head>
    <title>program15</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
unlink("losowe.txt");

for ($liczba = 0; $liczba <10; $liczba++)
{
    $i = rand(0, 1000);
    // żeby wprowadzić liczby z zasada - jedna liczb jeden wiersz , trzeba skorzystac z \n
    file_put_contents("losowe.txt", "$i\n", FILE_APPEND | LOCK_EX);
}

$plik = fopen("losowe.txt", "r");

// funkcja fseek ustawia pozycje wskaźnika, offset 0 oznacza że
// wskaźnik zostaje ustawiony na poczatku pliku
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

// aby nie wyswietalo jedenastej liczby - 0 (end of file) trzeba bylo
// w warunku zrobic $rozmiar-tab - 1 aby tego 0 nie wyświetlilo
$rozmiartab = count($tablica);
for($x = 0; $x < $rozmiartab - 1; $x++)
{
    echo "$tablica[$x] ";
}

echo "<br/>";
echo "<br/>";
print("Najwieksza liczba jest: ");
print(max($tablica));

fclose($plik);
?>

</body>
</html>