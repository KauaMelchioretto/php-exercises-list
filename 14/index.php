<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h2>Insira uma temperatura em F°</h2>";
    if (!isset($_GET['temperatureF'])) { ?>
        <form action="index.php" method="GET">
            <input type="number" name="temperatureF" placeholder="" />
            <input type="submit" value="Calcular" />
        </form>
    <?php } else {
        $temperatureF = $_GET['temperatureF'];
        $temperatureC = round(5 * ($temperatureF - 32) / 9);
        echo "<p> $temperatureC graus celsius </p>";
    }
    ?>
</body>

</html>