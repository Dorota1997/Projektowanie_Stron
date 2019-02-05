<?php
session_start();
if (!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h2>Gra</h2>
    </div>
    <br/>
    <div class="form-horizontal" >
        <div class="row">
            <div class="col-sm-2 control-label">Witaj</div>
                <label class="col-sm-3 form-control"><?php echo $_SESSION['user']; ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 control-label">Id sesji</div>
                <label class="col-sm-3 form-control"><?php echo session_id(); ?></label>
        </div>

        <div class="form-actions">
            <a class="btn btn-info" href="wyloguj.php">Wyloguj się!</a>
        </div>
    </div>
</div>

</body>
</html>