<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="index.css" rel="stylesheet" />
</head>

<body>
    <div>
        <?php
        for ($i = 0; $i < 10; $i++) {
            $array[$i] = rand(1, 10);
        }
        ?>
        <h1>Array desordenado</h1>
        <div class="numbers">
            <?php
            for ($i = 0; $i < 10; $i++) {
            ?>
                <p> <?php echo $array[$i] ?></p>
            <?php
            }
            ?>
        </div>

        <?php
        sort($array, SORT_NUMERIC);
        ?>
        <h1>Array ordenado</h1>
        <div class="numbers">
            <?php
            for ($i = 0; $i < 10; $i++) {
            ?>
                <p> <?php echo $array[$i] ?></p>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>