<html>
<head>
    <title>program9</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<?php
    $wynik = 0;

    function losowo()
    {
        $wylosowana = rand(1,15);
        return $wylosowana;
    }

    for($liczba=1; $liczba<=10; $liczba++)
    {
        $wylosowana_liczba = losowo();
        $wynik = $wynik + $wylosowana_liczba;
        print("$wylosowana_liczba<br/>");
    }

    print("Suma = $wynik");

?>

</body>
</html>