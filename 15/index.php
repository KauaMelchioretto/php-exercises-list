<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css" />
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_GET['text'])) { ?>
        <form action="index.php" method="GET">
            <h1>Insira palavras na caixa de texto</h1>
            <textarea type="text" name="text" cols="30" rows="10"> </textarea>
            <div class="buttons--form">
                <input type="submit" value="Enviar" />
                <input type="reset" value="Limpar">
            </div>
        </form>
    <?php } else {
        $text = $_GET['text'];
        $countString = strlen($text);
        $word = str_word_count($text);
        $listText = str_word_count($text, 1);
    ?>

        <p><?php echo "$countString caractéres" ?></p>
        <p><?php echo "$word palavras" ?></p>

        <ul>
            <?php for ($i = 0; $i < $word; $i++) {
                echo "<li>$listText[$i]</li>";
            } ?>
        </ul>
    <?php } ?>

</body>

</html>