<html>
<head>
    <title>program13</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php

// polecenie unlink kasuje plik o podanej nazwie. Kasuję liczby.txt żeby nie zwiększać
// jego zawartości po kolejnym uruchamianiu skryptu. Przykładowo pierwsze uruchomienie:
// ponad 8 tys znaków, drugie uruchomienie ponad 16 ... itd
unlink("liczby.txt");

for($i = 1; $i <=10000; $i++)
{
    if($i % 2 == 0 && $i % 3 == 0)
    {
        // funkcja wrzucajaca informacje do pliku. Musiałam zostawić flage FILE_APPEND, inaczej
        // w pliku tekstowym zostawała tylko ostatnia wartość czyli 9996. Mając flagę FILE_APPEND poprzednia
        // zawartośc nie zostaje skasowana.
        file_put_contents("liczby.txt", "$i ", FILE_APPEND | LOCK_EX);
    }
}

//funkcja czytająca zawartość pliku jako string
echo file_get_contents("liczby.txt");
?>

</body>
</html>