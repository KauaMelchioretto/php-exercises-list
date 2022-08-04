<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <div class="inputs">
        <form action="imc.php" method="GET">
            <label>Digite seu peso</label>
            <input type="decimal" placeholder="Insira seu peso" name="peso" required="number" pattern="[0.1-9.9]+$">
            <label>Digite sua altura</label>
            <input type="decimal" placeholder="Insira sua altura" name="altura" required="number" pattern="[0.1-9.9]+$">
            <div class="buttons">
                <button type="submit">Calcular</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </div>
</body>
</html>