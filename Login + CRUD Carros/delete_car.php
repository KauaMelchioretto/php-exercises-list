<?php
$db = new mysqli("localhost", "root", "password", "application");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["car_id"])) {
    $car_id = $_POST["car_id"];
    deleteCar($db, $car_id);
}

function deleteCar($db, $id) {
    $delete = "DELETE FROM CARROS WHERE ID = '$id'";

    if ($db->query($delete) === TRUE) {
        echo "Carro deletado com sucesso!";
    } else {
        echo "Erro ao deletar carro: " . $db->error;
    }
}
?>
