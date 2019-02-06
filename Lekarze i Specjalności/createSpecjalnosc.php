<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Create</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
require 'database.php';
if ( !empty($_POST)) {
    $nazwaError = null;
    $nazwa = $_POST['nazwa'];
    $numerLekarza = $_POST['numerLekarza'];
    $valid = true;
    if (empty($nazwa)) {
        $nazwaError = 'wprowadź nazwa specjalnosci';
    }

    if (!empty($nazwaError))
    {
        $valid = false;
    }

    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // wlacza wyrzucanie bledow
        $sql = "INSERT INTO specjalnosci (nazwa,numerLekarza) values(?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nazwa, $numerLekarza));
        Database::disconnect();
        header("Location: index.php");
    }
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
                    <i class="fas fa-folder-plus fa-7x"></i>
                </div>
                <p class="text-center" style="font-weight: bold;">Dodaj nową specjalność</p>
                <p class="text-justify" style="font-size: 75% !important">
                    <i class="fas fa-exclamation-circle"></i> Wypełnij pola, a następnie kliknij przycisk "Dodaj"
                </p>
                <hr/>

                <form class="form-horizontal" action="createSpecjalnosc.php" method="post">
                    <div class="form-group">
                        <label class=" col-sm-7 control-label">Nazwa specjalności</label>
                        <div class="col-sm-8">
                            <input name="nazwa" type="text" class="form-control" placeholder="wpisz nazwe specjalnosci"
                                   value="<?php echo (!empty($nazwa))?$nazwa:''; ?>">
                            <?php
                            if (!empty($nazwaError))
                                echo "<span class='text-danger'>".$nazwaError."</span>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-8" >
                        <?php
                        $pdo = Database::connect();
                        $sql = "SELECT * FROM lekarze";
                        echo "<label for=\"numerLekarza\">Wybierz lekarza</label>";
                        echo "<select name='numerLekarza' id='numerLekarza' class='form-control'>";
                        foreach($pdo->query($sql) as $row)
                        {
                            echo "<option value='" . $row['idLekarza'] . "'>" . " " . $row['imie'] . " " . $row['nazwisko'] . "</option>";
                        }
                        Database::disconnect();
                        echo "</select>";
                        ?>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Dodaj</button>
                        <a class="btn btn-light" href="index.php">Powrót</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div> <!-- /container -->
</body>
