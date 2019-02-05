<?php
echo "<br/>Promien = $promien<br/>";

if(!empty($_POST['promien']))
{
    $wynik = 4 / 3 * 3.14 * pow($promien, 3);
    print("Objetosc kuli = $wynik<br/>");
}

?>