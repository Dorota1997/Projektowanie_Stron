<html>
<head>
    <title>program4</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>

<p>Losowanie do momentu pojawienia się liczby 27</p>

<?php
    $isFound = false;

    while(!$isFound)
    {
        $number = rand(1, 49);

        if($number != 27)
        {
            print $number;
            print ("<br/>");
        }
        else if($number == 27)
        {
            $isFound = true;
            print("<br/>");
            print("<br/>");
            print("Wylosowano liczbe 27!!");
        }
    }



?>

</body>
</html>
