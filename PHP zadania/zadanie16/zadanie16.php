<html>
<head>
    <title>program16</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<h1>Wybierz:</h1>


    <form method = "post">
        <p>
            <label>
                <input type="checkbox" name="ob_kuli" value="true">
                Objętość kuli
            </label>
        </p>

        <p>
            <label>
                <input type="checkbox" name="pole_kuli">
                Pole powierzchni kuli
            </label>
        </p>

        <p>Wpisz wartość promienia:</p>

        <p>
            <input name="promien" type="text" />
            <button type="submit" name="button">Policz</button>
        </p>
    </form>

<?php
$promien = @$_POST['promien'] ;

if(isset($_POST['ob_kuli']))
{
    include("ob_kuli.php");
}

if(isset($_POST['pole_kuli']))
{
    include("pole_kuli.php");
}

?>

</body>
</html>