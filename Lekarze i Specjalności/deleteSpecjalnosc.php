<?php
require 'database.php';
$idSpecjalnosc = 0;
if ( !empty($_GET['idSpecjalnosc'])) {
    $idSpecjalnosc = $_GET['idSpecjalnosc'];
}

if ( !empty($_POST)) {
    $idSpecjalnosc = $_POST['idSpecjalnosc'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM specjalnosci WHERE idSpecjalnosc = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idSpecjalnosc));
    Database::disconnect();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Usun Specjalnosc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include('nawigacja.php');
?>

<div class="container">
        <div class="form-horizontal">
            <hr />
            <div class="col-lg-6 col-md-8 mx-auto jumbotron" style="margin-top: 5%;">
                <div style="font-family: 'Arima Madurai', sans-serif; font-size:130%; margin-top: 5%;">
                    <div class="text-center" style="margin-bottom: 15px;">
                        <i class="fas fa-trash-alt fa-7x"></i>
                    </div>
                    <p class="text-center" style="font-weight: bold;">Usuń specjalność</p>
                    <p class="text-justify" style="font-size: 75% !important">
                        <i class="fas fa-exclamation-circle"></i> Wybierz czy chcesz usunąć specjalność
                    </p>
                    <hr/>

                    <form class="form-horizontal" action="deleteSpecjalnosc.php" method="post">
                        <input type="hidden" name="idSpecjalnosc" value="<?php echo $idSpecjalnosc;?>"/>
                        <p class="alert alert-error">Czy na pewno chcesz usunąć specjalność?</p>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-danger">Tak</button>
                            <a class="btn" href="index.php">Nie</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div> <!-- /container -->
</body>
</html>