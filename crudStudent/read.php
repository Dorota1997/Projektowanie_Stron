<?php
require 'database.php';
$indeks = null;
if ( !empty($_GET['indeks'])) {
    $indeks = $_REQUEST['indeks'];
}
if ( null==$indeks ) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM crudStudent where indeks= ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($indeks));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Read</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Dane Studenta</h3>
        </div>
        <div class="form-horizontal" >
            <div class="row">
                <div class="col-sm-3 control-label">Numer indeksu</div>
                    <label class="form-control col-sm-3"><?php echo $data['indeks'];?></label>
            </div>
            <div class="row">
                <div class="col-sm-3 control-label">Imie</div>
                <label class="form-control col-sm-3"><?php echo $data['imie'];?></label>
            </div>
            <div class="row">
                <div class="col-sm-3 control-label">Nazwisko</div>
                <label class="form-control col-sm-3"><?php echo $data['nazwisko'];?></label>
            </div>
            <div class="row">
                <div class="col-sm-3 control-label">Email</div>
                <label class="form-control col-sm-3"><?php echo $data['email'];?></label>
            </div>
            <div class="row">
                <div class="col-sm-3 control-label">Telefon</div>
                <form class="form-control col-sm-3"><?php echo $data['mobile'];?></>
            </div>
            <div class="form-actions">
                <a class="btn btn-info" href="index.php">Cofnij</a>
            </div>
        </div>
    </div>
</div> <!-- /container -->
</body>
</html>
