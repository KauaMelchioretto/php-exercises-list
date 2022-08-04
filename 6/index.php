<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        for ($i = 65; $i <= 90; $i++) {
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
        ?>

            <div style="background-color: rgb(<?php echo "$red, $green, $blue" ?>)" class="item">
                <?php echo chr($i); ?>
            </div>

        <?php } ?>
    </div>
</body>

</html>