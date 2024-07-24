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

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    ?>

    <form action="" method="post">
        <div>
            <input type="hidden" name="car_id" id="car_id">
        </div>
        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required>
        </div>
        <div>
            <label for="fabricante">Fabricante:</label>
            <input type="text" name="fabricante" id="fabricante" required>
        </div>
        <div>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco" required>
        </div>
        <div>
            <button type="submit" name="action" id="action" value="salvar">Salvar</button>
        </div>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
            if (!isset($_POST["modelo"]) || !isset($_POST["fabricante"]) || !isset($_POST["preco"])) {
                echo "É necessário preencher todas as informações para realizar o cadastro!";
                return;
            }

            $modelo = $_POST["modelo"];
            $fabricante = $_POST["fabricante"];
            $preco = (double)$_POST["preco"];
            
            if(isset($_POST["car_id"]) && $_POST["action"] == 'editar') {
                $car_id = $_POST["car_id"];
                $select = "SELECT * FROM CARROS WHERE ID = '$car_id'";
                $result = $db->query($select);

                if($result->num_rows > 0) {
                    $update = "UPDATE CARROS SET MODELO = '$modelo', 
                                FABRICANTE = '$fabricante', 
                                PRECO = '$preco'
                                WHERE ID = '$car_id'";
                    
                    if($db->query($update) === TRUE) {
                        echo("Registro atualizado com sucesso!");
                    } else {
                        echo("Erro ao atualizar o registro de ID = '$car_id'" . $db->error);
                    }
                } else {
                    echo("Não foi possível atualizar o registro pois já foi deletado!");
                }


            } else if ($_POST["action"] = 'salvar') {
                $insert = "INSERT INTO CARROS(MODELO, FABRICANTE, PRECO) VALUES('$modelo', '$fabricante', '$preco');";
    
                if ($db->query($insert) === TRUE) {
                    echo "Carro cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar carro: " . $db->error;
                }
            } else {
                echo("Erro na ação!");
            }
        }

        $_POST = array();
    ?>

    <table border="1" style="border-color:1px solid black" cellspacing="2" cellpadding="2" id="carTable">
        <?php include 'list_cars.php'; ?>
    </table>

    <script>
       function deleteCar(car_id) {
            if (confirm("Tem certeza que deseja deletar este carro?")) {
                var xhr = new XMLHttpRequest();
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert('Deletado com sucesso!');
                            loadCarList();
                        } else {
                            alert('Erro ao deletar carro: ' + xhr.status);
                        }
                    }
                };

                xhr.open("POST", "delete_car.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("car_id=" + car_id);
            }
        }

        function editCar(car_id) {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if(xhr.readyState === XMLHttpRequest.DONE) {
                    if(xhr.status === 200) {
                        var car = JSON.parse(xhr.responseText);

                        if(car.error) {
                            alert(car.error);
                        } else {
                            document.getElementById('car_id').value = car.ID;
                            document.getElementById('modelo').value = car.MODELO;
                            document.getElementById('fabricante').value = car.FABRICANTE;
                            document.getElementById('preco').value = car.PRECO;
                            document.getElementById('action').value = "editar";
                        }
                    } else {
                        alert('Erro ao carregar informações do carro: ' + xhr.status);
                    }
                }
            }

            xhr.open("POST", "edit_car.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("car_id=" + car_id);
        }

        function loadCarList() {
            var xhr = new XMLHttpRequest();
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('carTable').innerHTML = xhr.responseText;
                    } else {
                        alert('Erro ao carregar lista de carros: ' + xhr.status);
                    }
                }
            };

            xhr.open("GET", "list_cars.php", true);
            xhr.send();
        }
    </script>
</body>
</html>