<?php
$db = new mysqli("localhost", "root", "password", "application");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function listCars($db) {
    $select = "SELECT * FROM CARROS";
    $result = $db->query($select);

    echo("<head>
            <tr>
                <td>ID</td>
                <td>Modelo</td>
                <td>Fabricante</td>
                <td>Preço</td>
                <td colspan='2'>Ações</td>
            </tr>
        </head>");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>' . $row["ID"] . '</td>
                <td>' . $row["MODELO"] . '</td>
                <td>' . $row["FABRICANTE"] . '</td>
                <td>' . $row["PRECO"] . '</td>
                <td><button onclick="deleteCar(' . $row["ID"] . ')">Deletar</button></td>
                <td><button onclick="editCar(' . $row["ID"] . ')">Editar</button></td>
                </tr>';
        }
    } else {
        echo "<tr><td colspan='5'>Não há registros de carro</td></tr>";
    }
}

listCars($db);
?>
