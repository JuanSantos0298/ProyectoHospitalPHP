<?php

//Establecemos como requisito el archivo de ConexionDB
include('Models/ConexionDB.php');
include('Views/inicioSesion_Vista.php');

//Establecemos nuestra variable intermediaria para el acceso a la DB
$con = new Conexion;

//Establecemos un if para saber si los campos estan llenos
if (isset($_POST["botonInicioSesion"])) {

    //Establecemos nuestras variables de comparacion para el login pasando lo que tenemos de los inputs aqui mediante JS
    $idusuario = $_POST["idusuario"];
    $password = $_POST["passusuario"];

    echo $idusuario;
    echo $password;

    //Establecemos una funcion para acceder a la comparativa de login pero no me jala todavia el login
    $con->iniciarSesion($idusuario, $password);

    if ($con == 1) {
        echo "<script>alert('Hola. '); window.location = 'prueba.html'</script>";
    } else {
        echo "<script>alert('No se puede we');</script>";
    }
}
