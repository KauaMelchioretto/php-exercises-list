<?php
$db = new mysqli("localhost", "root", "password", "application");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["car_id"])) {
    $car_id = $_POST["car_id"];
    getCarDetails($db, $car_id);
}

function getCarDetails($db, $car_id) {
    $select = "SELECT * FROM CARROS WHERE ID = '$car_id'";
    $result = $db->query($select);

    if($result->num_rows > 0) {
        $car = $result->fetch_assoc();
        echo json_encode($car);
    } else {
        echo json_encode(array("error" => "Carro não encontrado"));
    }
}
?>