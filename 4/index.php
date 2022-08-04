<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="index.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_GET["number"])) {
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
        $number = $_GET["number"];
        if ($number == 0) {
            $msg = "Zero!";
        } else if ($number > 0) {
            $msg = "Valor digitado positivo!";
        } else if ($number < 0) {
            $msg = "Valor digitado negativo!";
        }         ?>

        <div class="result" style="border: 5px solid rgb(<?php echo "$red, $blue, $green" ?>)" ;>
            <?php echo $number . ' ' . $msg; ?>

        </div>
    <?php  } else
        echo "<h1> Digite um valor!"; ?>

    <form action="index.php" method="GET">
        <input type="number" name="number" id="number" required="number" />
        <input type="submit" value="Enviar" placeholder="Insira um número">
    </form>

</body>

</html>