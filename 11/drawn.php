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
    $number1 = $_GET["number1"];
    $number2 = $_GET["number2"];
    $numberDrawn = rand($number1, $number2);
    ?>

    <div class="drawn--number">
        <p><?php echo $numberDrawn ?></p>
    </div>
</body>
</html>