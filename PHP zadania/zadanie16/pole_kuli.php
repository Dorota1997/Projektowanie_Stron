<?php
echo "<br/>Promien = $promien<br/>";

if(!empty($_POST['promien']))
{
    $wynik = 4 * 3.14 * pow($promien, 2);
    print("Pole kuli = $wynik <br/>");
}


?>