<html>
<head>
    <title>program6</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Wpisz dowolny tekst: </p>

<form action="zadanie6.php" method="post">
    <input name="pole" type="text">
</form>

<?php
    $tekst = @$_POST['pole'];
    function formatowanie_tekstu($tekst)
    {
        print("<span style=\"font-family: Arial; color:red; font-style:italic\">$tekst</span>");
    }

    formatowanie_tekstu($tekst);
?>

<body/>
<html/>

