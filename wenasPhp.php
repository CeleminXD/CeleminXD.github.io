<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$dispositivo = $_POST['dispositivo'];
$temperatura = $_POST['temperatura'];
$humedad = $_POST['humedad'];


   $sql = "INSERT INTO `datos` (`id`, `fecha`, `dispositivo`, `temperatura`, `humedad`) VALUES (NULL, current_timestamp(), '$dispositivo', '$temperatura', '$humedad');";

    if ($mysqli->query($sql)===TRUE) {
        echo "Data ok.";
    }

    else {
        echo "Data error" . $mysqli->error;
    }
    $mysqli->close();




?>