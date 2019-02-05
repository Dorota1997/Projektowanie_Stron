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

<?php
require 'database.php';
if ( !empty($_POST)) {
    // wykonywania programy w przypadku istnienia wartoĹ›ci w tablicy POST
    $indeksError = null;
    $imieError = null;
    $nazwiskoError = null;
    $emailError = null;
    $mobileError = null;

    // wartoĹ›ci tablicy POST
    $indeks = $_POST['indeks'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // walidacja kolejnych zmiennych pĂłl formularza
    $valid = true;
    if(empty($indeks)) {
        $indeksError = 'wpisz numer indeksu studenta';
        $valid = false;
    }
    if (empty($imie)) {
        $imieError = 'wpisz imie studenta';
        $valid = false;
    }
    if (empty($nazwisko)) {
        $nazwiskoError = 'wpisz nazwisko studenta';
        $valid = false;
    }
    if (empty($email)) {
        $emailError = 'wpisz adress email';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'wpisz poprawny adres email';
        $valid = false;
    }
    if (empty($mobile)) {
        $mobileError = 'wpisz numer telefonu';
        $valid = false;
    }

    if (!empty($indeksError) || !empty($imieError) || !empty($nazwiskoError)
        || !empty($emailError) || !empty($mobileError))
    {
        $valid = false;
    }

// wprowadĹş dane
    if ($valid) {
        echo "ok- wprowadzenie";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // wlacza wyrzucanie bledow
        $sql = "INSERT INTO crudStudent (indeks,imie,nazwisko,email,mobile) values(?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($indeks, $imie, $nazwisko, $email, $mobile));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <h3>Nowy student</h3>
    </div>
    <form class="form-horizontal" action="create.php" method="post">
        <div class="form-group">
            <label class=" col-sm-1 control-label">Indeks</label>
            <div class="col-sm-5">
                <input name="imie" type="text" class="form-control" placeholder="wpisz numer indeksu studenta"
                       value="<?php echo (!empty($indeks))?$indeks:''; ?>">
                <?php
                if (!empty($indeksError))
                    echo "<span class='text-danger'>".$indeksError."</span>";
                ?>
            </div>
        </div>
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