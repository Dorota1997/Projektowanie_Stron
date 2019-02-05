<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>PHP CRUD Grid</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Utwórz</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Indeks</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Adres e-mail</th>
                <th>Numer telefonu</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM crudStudent ';
            foreach ($pdo->query($sql) as $row)
            {
                echo '<tr>';
                echo '<td>'. $row['indeks'] . '</td>';
                echo '<td>'. $row['imie'] . '</td>';
                echo '<td>'. $row['nazwisko'] . '</td>';
                echo '<td>'. $row['email'] . '</td>';
                echo '<td>'. $row['mobile'] . '</td>';
                echo '<td><a class="btn btn-secondary" href="read.php?indeks='.$row['indeks'].'">Przeglądaj</a></td>';
                echo '<td><a class="btn btn-success" href="update.php?indeks='.$row['indeks'].'">Aktualizuj</a></td>';
                echo '<td><a class="btn btn-danger" href="delete.php?indeks='.$row['indeks'].'">Usuń</a></td>';
                echo '</tr>';

            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>