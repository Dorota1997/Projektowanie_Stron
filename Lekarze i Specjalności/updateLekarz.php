<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
require 'database.php';

$idLekarza = null;
if ( !empty($_GET['idLekarza'])) {
    $idLekarza = $_REQUEST['idLekarza'];
}
if ( null==$idLekarza ) {
    header("Location: index.php");
}
if ( !empty($_POST)) {
    $imieError = null;
    $nazwiskoError = null;

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $valid = true;
    if (empty($imie)) {
        $imieError = 'wprowadź imie Lekarza';
    }
    if (empty($nazwisko)) {
        $nazwiskoError = 'wprowadź nazwisko Lekarza';
    }
    if (!empty($imieError) || !empty($nazwiskoError))
    {
        $valid = false;
    }
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE lekarze  set imie = ?, nazwisko = ? WHERE idLekarza = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($imie, $nazwisko,$idLekarza));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM lekarze where idLekarza = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idLekarza));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $imie = $data['imie'];
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
                    <i class="fas fa-user-edit fa-7x"></i>
                </div>
                <p class="text-center" style="font-weight: bold;">Edytuj Lekarza</p>
                <p class="text-justify" style="font-size: 75% !important">
                    <i class="fas fa-exclamation-circle"></i> Edytuj dane lekarza, a następnie kliknij przycisk "Zapisz"
                </p>
                <hr/>

                <form class="form-horizontal" action="updateLekarz.php?idLekarza=<?php echo $idLekarza ?>" method="post">
                    <div class="form-group">
                        <label class=" col-sm-4 control-label">Imię</label>
                        <div class="col-sm-8">
                            <input name="imie" type="text" class="form-control" placeholder="wpisz imię Lekarza"
                                   value="<?php echo (!empty($imie))?$imie:''; ?>">
                            <?php
                            if (!empty($imieError))
                                echo "<span class='text-danger'>".$imieError."</span>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-4 control-label">Nazwisko</label>
                        <div class="col-sm-8">
                            <input name="nazwisko" type="text" class="form-control" placeholder="wpisz nazwisko Lekarza"
                                   value="<?php echo (!empty($nazwisko))?$nazwisko:''; ?>">
                            <?php
                            if (!empty($nazwiskoError))
                                echo "<span class='text-danger'>".$nazwiskoError."</span>";
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