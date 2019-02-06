<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'database.php';

$pdo = Database::connect();
$podajImie = $_GET["imie"];
$podajNazwisko = $_GET["nazwisko"];

$sql = "SELECT * FROM lekarze LEFT JOIN specjalnosci ON (lekarze.idLekarza = specjalnosci.numerLekarza) 
        WHERE (lekarze.nazwisko LIKE '%".$podajNazwisko."%' AND lekarze.imie LIKE '%".$podajImie."%')";

$data = array();
foreach($pdo->query($sql) as $row)
{
    $data[$row["idLekarza"]]["idLekarza"] = $row["idLekarza"];
    $data[$row["idLekarza"]]["imie"] = $row["imie"];
    $data[$row["idLekarza"]]["nazwisko"] = $row["nazwisko"];

    $data[$row["idLekarza"]]["specjalnosci"][$row["idSpecjalnosc"]] = array(
        "nazwa" => $row["nazwa"],
        "idSpecjalnosc" => $row["idSpecjalnosc"]
    );
}
?>

<?php
include('nawigacja.php');
?>

<div class="container">
    <div class="row">
        <table class="table table-hover table-sm" style="font-family: 'Arima Madurai', sans-serif;">
            <thead>
            <tr>
                <th class="text-center">IDLekarza</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Specjalności</th>
                <th>Usun lekarza</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $lekarz){
                echo '<tr>';
                echo '<td class="text-center" style="vertical-align: middle;">'. $lekarz['idLekarza'] . '</td>';
                echo '<td style="vertical-align: middle;">'. $lekarz['imie'] . '</td>';
                echo '<td style="vertical-align: middle;">'. $lekarz['nazwisko'] . '</td>';
                echo '<td>';
                echo '<table class="table table-sm table-hover" style="vertical-align: middle;">';
                foreach($lekarz["specjalnosci"] as $subkey => $subvalue){
                    if ($subvalue["nazwa"] == "")
                        echo "Ten lekarz nie ma przypisanej specjalności";
                    else {
                        echo '<tr>';
                        echo '<td style="vertical-align: middle;">' . $subvalue["nazwa"] . "</td>";
                        echo '<td style="text-align: right; vertical-align: middle;"><a class="btn btn-danger btn-sm" href="deleteSpecjalnosc.php?idSpecjalnosc=' . $subvalue['idSpecjalnosc'] . '">Usuń</a>
                                   <a class="btn btn-secondary btn-sm" href="updateSpecjalnosci.php?idSpecjalnosc=' . $subvalue['idSpecjalnosc'] . '">Edytuj</a></td>';
                        echo "</tr>";
                    }
                }
                echo '</table>';
                echo '</td>';
                echo '<td style="vertical-align: middle;"><a class="btn btn-danger btn-sm" href="deleteLekarz.php?idLekarza='.$lekarz['idLekarza'].'">Usuń</a>
                        <a class="btn btn-secondary btn-sm" href="updateLekarz.php?idLekarza='.$lekarz['idLekarza'].'">Edytuj</a></td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
