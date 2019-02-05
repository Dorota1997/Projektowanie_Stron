<html>
<head>
    <title>program1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
<body>
<figure>
    <img src="./img/euro.jpg" width="250" alt="Nie udało się załadować zdjęcia">
    <img src="./img/pln.jpg" width="250" alt="Nie udało się załadować zdjęcia">
</figure>

<p>Przelicznik <strong>PLN</strong> -> EUR<br/></p>

<form action="zadanie1.php" method="post">
    <input name="pole" type="text" />
    <input type="submit" />
</form>

<?php
  $kurs = 4.32;
  $pole = @$_POST['pole'] ;
  $wynik = $pole * $kurs;
  if(!empty($_POST['pole']))
  {
      echo $wynik;
  }
?>

<p>Przelicznik <strong>EUR</strong> -> PLN<br/></p>
<form action="zadanie1.php" method="post">
    <input name="pole2" type="text" />
    <input type="submit" />
</form>

<?php
  $kurs = 4.32;
  $pole2 = @$_POST['pole2'];
  $wynik = $pole2 / $kurs;
  if(!empty($_POST['pole2']))
  {
    echo $wynik;
  }
?>
</body>
</html>
