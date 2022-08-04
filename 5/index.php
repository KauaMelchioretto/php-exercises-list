<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
      //  var_dump('', 1, 1.0, true, [], (object) '', null);

        $arrayTypes = array('', 1, 1.0, true, [], (object) '', null);
        foreach ($arrayTypes as $value) {
            var_dump($value);
        }
        ?>
    </div>
</body>

</html>