<html>
<head>
    <title>program8</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Wybierz liczbę od 1 do 3: </p>

<form action="zadanie8.php" method="post">
    <input name="pole" type="text">
</form>

<?php
    $wybor = @$_POST['pole'];
    if($wybor == 1)
    {
        include("1.php");
    }
    else if($wybor == 2)
    {
        include("2.php");
    }
    else if($wybor == 3)
    {
        include("3.php");
    }
?>

</body>
</html>