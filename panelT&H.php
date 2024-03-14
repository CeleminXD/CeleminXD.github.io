<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}



$sql = "SELECT * FROM `datos` ORDER BY `datos`.`id` DESC LIMIT 1";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $data = array("temperatura" => $row["temperatura"], "humedad" => $row["humedad"]);
    echo json_encode($data);


} else {
    echo json_encode(array("error" => "0 resultados"));
}
$mysqli->close();