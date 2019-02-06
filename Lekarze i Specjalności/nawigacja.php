<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" style="font-family: 'Arima Madurai', sans-serif;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
            <input type="text" class="form-control mr-sm-2" placeholder="Wpisz imie" name="imie"
                   value="<?php echo (!empty($podajImie))?$podajImie:''; ?>"/>
            <input type="text" class="form-control mr-sm-2" placeholder="Wpisz nazwisko" name="nazwisko"
                   value="<?php echo (!empty($podajNazwisko))?$podajNazwisko:''; ?>"/>
            <button class="btn btn-secondary" type="submit">Szukaj</button>
        </form>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="navbar-brand" href="index.php">Lekarze</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="createLekarz.php">Dodaj Lekarza
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="createSpecjalnosc.php">Dodaj specjalność
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>