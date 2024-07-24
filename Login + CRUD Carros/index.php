<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $db = new mysqli("localhost", "root", "password", "application");

        if($db->connect_error) {
            die("Connection failed" . $db->connect_error);
        }

        $create_tables = "CREATE TABLE IF NOT EXISTS USUARIOS (
            ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            NOME VARCHAR(80),
            SENHA CHAR(255)
        );";
        
        if($db->query($create_tables) === FALSE) {
            echo("Erro ao criar tabelas" . $db->error);
        }
        
        $create_tables = "CREATE TABLE IF NOT EXISTS CARROS (
        	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            MODELO VARCHAR(20),
            FABRICANTE VARCHAR(60),
            PRECO DECIMAL(10,2)
        );";

        if($db->query($create_tables) === FALSE) {
            echo("Erro ao criar tabelas" . $db->error);
        }
    ?>

    <form  method="post" action="">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div>
            <button name="action" value="login" type="submit">Login</button>
            <button name="action" value="cadastrar" type="submit">Cadastrar</button>
            <button type="reset">Cancelar</button>
        </div>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
            $action = $_POST["action"];
            $nome = $_POST["nome"];
            $senha = $_POST["senha"];

            $sql = "";
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            if($action == 'cadastrar') {
                $sql = "INSERT INTO USUARIOS(NOME, SENHA) VALUES ('$nome', '$senhaHash');";
                if($db->query($sql) === TRUE) {
                    echo("Cadastrado com sucesso!");
                } else {
                    echo("Erro ao cadastrar " . $db->error);
                }
            } else if($action == 'login') {
                $sql = "SELECT NOME, SENHA FROM USUARIOS WHERE NOME = '$nome'";
                $result = $db->query($sql);
                
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if(password_verify($senha, $row["SENHA"])) {
                            header("Location: http://localhost/cars.php");
                        } else {
                            echo("<p>Senha incorreta!</p>");
                            return;
                        }
                    }
                } else {
                    echo("<p>Usuário não existe no banco</p>");
                }
            }
        }
    ?>

</body>
</html>