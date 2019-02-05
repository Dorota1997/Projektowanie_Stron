<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
require 'database.php';

$indeks = null;
if ( !empty($_GET['indeks'])) {
    $indeks = $_REQUEST['indeks'];
}
if ( null==$indeks ) {
    header("Location: index.php");
}

if ( !empty($_POST)) {
    // keep track validation errors
    $imieError = null;
    $nazwiskoError = null;
    $emailError = null;
    $mobileError = null;

    // keep track post values
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // validate input
    $valid = true;
    if (empty($imie)) {
        $imieError = 'wpisz imie studenta';
    }
    if (empty($nazwisko)) {
        $nazwiskoError = 'wpisz nazwisko studenta';
    }
    if (empty($email)) {
        $emailError = 'wpisz adress email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'wpisz poprawny adres email';
    }
    if (empty($mobile)) {
        $mobileError = 'wpisz numer telefonu';
    }

    if (!empty($imieError) || !empty($nazwiskoError)
        || !empty($emailError) || !empty($mobileError))
    {
        $valid = false;
    }

    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE crudStudent  set imie = ?, nazwisko = ?, email = ?, mobile =? WHERE indeks = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($imie, $nazwisko,$email,$mobile,$indeks));
        Database::disconnect();
        header("Location: index.php");
    }

    // jezeli nie jest wyslany POST (czli jest jedynie GET)
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM crudStudent where indeks = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($indeks));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $imie = $data['imie'];
    $nazwisko = $data['nazwisko'];
    $email = $data['email'];
    $mobile = $data['mobile'];
    Database::disconnect();
}
?>
<body>
<div class="jumbotron">
    <div class="row">
        <h3>Aktualizacja danych Studenta</h3>
    </div>
    <form class="form-horizontal" action="update.php?indeks=<?php echo $indeks ?>" method="post">
        <div class="form-group">
            <label class=" col-sm-1 control-label">Imie</label>
            <div class="col-sm-5">
                <input name="imie" type="text" class="form-control" placeholder="wpisz imie studenta"
                       value="<?php echo (!empty($imie))?$imie:''; ?>">
                <?php
                if (!empty($imieError))
                    echo "<span class='text-danger'>".$imieError."</span>";
                ?>
            </div>

        </div>
        <div class="form-group">
            <label class=" col-sm-1 control-label">Nazwisko</label>
            <div class="col-sm-5">
                <input name="nazwisko" type="text" class="form-control" placeholder="wpisz nazwisko studenta"
                       value="<?php echo (!empty($nazwisko))?$nazwisko:''; ?>">
                <?php
                if (!empty($nazwiskoError))
                    echo "<span class='text-danger'>".$nazwiskoError."</span>";
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class=" col-sm-1 control-label">E-mail</label>
            <div class="col-sm-5">
                <input name="email" type="text" class="form-control" placeholder="wpisz e-mail studenta"
                       value="<?php echo (!empty($email))?$email:''; ?>">
                <?php
                if (!empty($emailError))
                    echo "<span class='text-danger'>".$emailError."</span>";
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class=" col-sm-1 control-label">Telefon</label>
            <div class="col-sm-5">
                <input name="mobile" type="text" class="form-control" placeholder="wpisz telefon mobile studenta"
                       value="<?php echo (!empty($mobile))?$mobile:''; ?>">
                <?php
                if (!empty($mobileError))
                    echo "<span class='text-danger'>".$mobileError."</span>";
                ?>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Zapisz</button>
            <a class="btn btn-light" href="index.php">Cofnij</a>
        </div>
    </form>
</div> <!-- /container -->
</body>
</html>