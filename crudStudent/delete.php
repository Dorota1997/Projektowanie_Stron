<?php
require 'database.php';
$indeks = 0;

if ( !empty($_GET['indeks'])) {
    $indeks = $_REQUEST['indeks'];
}

if ( !empty($_POST)) {
    // keep track post values
    $indeks = $_POST['indeks'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM crudStudent  WHERE indeks = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($indeks));
    Database::disconnect();
    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Create</title>
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
            <h3>Usuń dane Studenta</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="indeks" value="<?php echo $indeks;?>"/>
            <p class="alert alert-error">Czy chcesz napewno usunąć dane?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Tak</button>
                <a class="btn" href="index.php">Nie</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>