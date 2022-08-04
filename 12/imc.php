<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="imc.css">
    <title>IMC</title>
</head>

<body>
    <div class="background">
        <div>
            <?php
            $peso = $_GET["peso"];
            $altura = $_GET["altura"];
            $imc = $peso / ($altura * $altura);
            if ($imc < 20) {
                $info_imc = "Abaixo do peso normal";
                $imgSrc = "img/abaixopeso.png";
            } else if ($imc < 24.9) {
                $info_imc = "Peso Normal";
                $imgSrc = "img/normal.png";
            } else if ($imc < 29.9) {
                $info_imc = "Excesso de peso";
                $imgSrc = "img/sobrepeso.png";
            } else if ($imc < 34.9) {
                $info_imc = "Obesidade moderada";
                $imgSrc = "img/obesidade1.png";
            } else if ($imc < 39.9) {
                $info_imc = "Obesidade mórbida";
                $imgSrc = "img/obesidade2.png";
            } else {
                $info_imc = "Obesidade mórbida";
                $imgSrc = "img/obesidade3.png";
            }
            ?>
        </div>
        <div class="imcApresentation">
            <h1>Seu IMC é: <?php echo number_format((float) $imc, 2) ?></h1>
            <p>Status: <?php echo $info_imc ?></p>
            <img src=<?php echo $imgSrc ?> alt="">
        </div>
    </div>
</body>

</html>