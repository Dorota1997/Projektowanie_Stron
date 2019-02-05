<html>
<head>
    <title>program2</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Sprawdźmy czy podana przez Ciebie liczba jest podzielna przez 2, 3 i 5</p><br/>
<p>Wpisz dowolną liczbę:</p>
<form action="zadanie2.php" method="post">
    <input name="pole" type="text" />
    <input type="submit" />
</form>

<?php
    $liczba = @$_POST['pole'];
    if($liczba  % 2 == 0 && $liczba % 3 == 0 && $liczba % 5 == 0)
    {
        if(!empty($_POST['pole']))
        {
            print 'Liczba jest podzielna przez 2, 3 i 5';
        }
    }
    else
    {
        if(!empty($_POST['pole']))
        {
            print 'Liczba nie jest podzielna przez 2, 3 i 5';
        }
    }
?>

</body>
</html>
