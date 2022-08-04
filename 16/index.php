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
    <?php if (!isset($_GET["lado1"])) { ?>
        <div>
            <form action="index.php" method="GET">
                <h1>Insira 3 lados de um triângulo.</h1>
                Lado 1: <input type="number" name="lado1">
                Lado 2: <input type="number" name="lado2">
                Lado 3: <input type="number" name="lado3">
                <div class="button--form">
                    <input type="submit" value="Classificar">
                </div>
            </form>
        </div>
    <?php } else {
        $lado1 = $_GET['lado1'];
        $lado2 = $_GET['lado2'];
        $lado3 = $_GET['lado3'];
        if ($lado1 == $lado2 and $lado2 == $lado3) {
            echo "<p>triângulo equilátero</p>";
        } else if ($lado1 <> $lado2 and $lado2 <> $lado3 and $lado1 <> $lado3) {
            echo "<p>triângulo escaleno</p>";
        } else {
            echo "<p>triângulo isóceles</p>";
        }
    } ?>
</body>

</html>