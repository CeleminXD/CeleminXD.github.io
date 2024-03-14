<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}


$user = strip_tags( $_POST['user']);
$email = strip_tags( $_POST['email']);
$rh = strip_tags( $_POST['rh']);
$password = sha1(strip_tags($_POST['password'])) ;
$passMeasure = strip_tags($_POST['password']);
$lenghtPass = strlen($passMeasure);
$now = date("Y-m-d H:i:s");



$passworV = sha1(strip_tags($_POST['passwordV'])) ;
$terms = isset($_POST['terms']);

if (empty($user)||empty($email)||empty($rh)||empty($password)||empty($passworV)) {
    echo "Viejo, no pueden haber espacios vacíos esa mierda no esta de adorno. -_-";
    die();
}
if($lenghtPass<8){
    echo "Papi, y si le metemos creatividad, esa mierda de contraseña esta muy corta. -_-";
    die();
}
if ($password!=$passworV) {
    echo "Tan chistosito el hpta, escriba esa malparida contraseña bien. -_-";
    die();
}
if (empty($terms)) {
    echo "Pedazo de aborto, si le incomoda permitirnos el acceso; tanto a la informacion de sus dispositivos, como al acceso a su camara y microfono. Tons larguese habrá un pendejo que si lo hara. :'(";
    die();
}


$sql = "SELECT * FROM `usersdata` WHERE `user` = '$user'";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {

    echo "El usuario $user ya está registrado en la base de datos.";
    die();
} 

$sql = "SELECT * FROM `usersdata` WHERE `email` = '$email'";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {

    echo "El correo $email ya está registrado en la base de datos.";
    die();
} 

   $sql = "INSERT INTO `usersdata` (`id`, `fecha`, `user`, `email`, `rh`, `password`) VALUES (NULL, current_timestamp(), '$user', '$email', '$rh', '$password');";

    if ($mysqli->query($sql)===TRUE) {
        echo "Muchas gracias afición, esto es para vosotros. ¡Siuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu! ";
    }


    else {
        echo "Data error" . $mysqli->error;
    }
    
    $mysqli->close();




?>