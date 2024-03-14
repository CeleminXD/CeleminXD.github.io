<?php

session_start ();
$mysqli = new mysqli('localhost', 'root', '', 'test');

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$user = strip_tags( $_POST['user']);
$password = sha1(strip_tags($_POST['password'])) ;


$sql = "SELECT `user`, `password` FROM `usersdata` WHERE `user`='$user'";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    if ($password===$row['password']) {
        echo "Puta, pero si sos vos. $user :)";

        $_SESSION['logged'] = 'yes';

        $sql = "SELECT * FROM `usersdata` WHERE `user` = '$user'";
        $resultado = $mysqli->query($sql);
    
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_array(MYSQLI_ASSOC);
    
             $fecha = $row['fecha'];
             $user = $row['user'];
             $email = $row['email'];
             $userId = $row['id'];    
    
    
        }
    
     
        $_SESSION['user'] = $user;
        $_SESSION['userId'] =$userId;
        $_SESSION['email'] = $email;
        
        $mysqli->close();

        echo'<meta http-equiv="refresh" content="3;url=http://192.168.13.14/panelT&H.html">';
    }


  else {
        echo "viejo andas como perdido :(";
        $_SESSION['logged'] = 'no';
       
    } 
}
 


?>