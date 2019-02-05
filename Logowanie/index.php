<?php
session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    header('Location: gra.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h2>Logowanie</h2>
    </div>
    <br/>
    <form class="form-horizontal" method="post" action="autoryzuj.php">
        <div class="form-group">
            <label class=" col-sm-3 control-label">Nazwa użytkownika</label>
            <div class="col-sm-5">
                <input name="login" type="text" class="form-control" placeholder="wpisz nazwe użytkownika"
                       value="<?php echo (!empty($login))?$login:''; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class=" col-sm-1 control-label">Hasło</label>
            <div class="col-sm-5">
                <input name="haslo" type="password" class="form-control" placeholder="wpisz swoje hasło"
                       value="<?php echo (!empty($haslo))?$haslo:''; ?>">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Zaloguj się</button>
        </div>
    </form>

    <?php
    if(isset($_SESSION['blad'])) {
        echo "<span style=\"color:red\">" . $_SESSION['blad'] . "</span>";
        unset($_SESSION['blad']); //Bład logowania jest czyszczony
    }
    ?>
</div>
</body>
</html>


