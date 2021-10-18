<?php

//Establecemos como requisito el archivo de ConexionDB
include_once 'Includes/user_session.php';
include_once 'Includes/user.php';

//Creacion de objeto de usuario para poder inciar el ambiente de sesiones y saber si hay sesiones existentes
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo "Hay sesion";
}else if(isset($_POST['idusuario']) && isset($_POST['passusuario'])){
    echo "Validacion de login";
}else{
    echo "Pantalla de login";
}


?>

