<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
require 'database.php';

$idSpecjalnosc = null;
if ( !empty($_GET['idSpecjalnosc'])) {
    $idSpecjalnosc = $_REQUEST['idSpecjalnosc'];
}
if ( null==$idSpecjalnosc ) {
    header("Location: index.php");
}
if ( !empty($_POST)) {
    $nazwaError = null;
    $nazwa = $_POST['nazwa'];
    $valid = true;

    if (empty($nazwa)) {
        $nazwaError = 'wprowadz nazwe specjalnosci';
    }
    if (!empty($nazwaError))
    {
        $valid = false;
    }
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE specjalnosci  set nazwa = ? WHERE idSpecjalnosc = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nazwa, $idSpecjalnosc));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM specjalnosci where idSpecjalnosc = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idSpecjalnosc));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nazwa = $data['nazwa'];
    $nazwisko = $data['nazwisko'];
    Database::disconnect();
}
?>
<body>

<?php
include('nawigacja.php');
?>

<div class="container">
    <div class="form-horizontal">
        <div class="col-lg-6 col-md-8 mx-auto jumbotron" style="margin-top: 5%;">
            <div style="font-family: 'Arima Madurai', sans-serif; font-size:130%; margin-top: 5%;">
                <div class="text-center" style="margin-bottom: 15px;">
                    <i class="fas fa-edit fa-7x"></i>
                </div>
                <p class="text-center" style="font-weight: bold;">Edytuj specjalnosci</p>
                <p class="text-justify" style="font-size: 75% !important">
                    <i class="fas fa-exclamation-circle"></i> Zmień nazwę specjalności, a następnie kliknij przycisk "Zapisz"
                </p>
                <hr/>

                <form class="form-horizontal" action="updateSpecjalnosci.php?idSpecjalnosc=<?php echo $idSpecjalnosc ?>" method="post">
                    <div class="form-group">
                        <label class=" col-sm-7 control-label">Nazwa specjalnosci</label>
                        <div class="col-sm-8">
                            <input name="nazwa" type="text" class="form-control" placeholder="wpisz nazwe specjalnosci"
                                   value="<?php echo (!empty($nazwa))?$nazwa:''; ?>">
                            <?php
                            if (!empty($nazwaError))
                                echo "<span class='text-danger'>".$nazwaError."</span>";
                            ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Zapisz</button>
                        <a class="btn btn-light" href="index.php">Powrót</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div> <!-- /container -->
</body>
</html>