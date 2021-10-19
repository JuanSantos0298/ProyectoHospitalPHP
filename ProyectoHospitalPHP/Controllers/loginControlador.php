<?php


//Establecemos un if para saber si los campos estan llenos
if (isset($_POST["botonInicioSesion"])) {

    //Establecemos nuestras variables de comparacion para el login pasando lo que tenemos de los inputs aqui mediante JS
    $idusuario = $_POST["idusuario"];
    $password = $_POST["passusuario"];

    $login = new Modelos();
    $login->Ingresar($idusuario, $password);

    if ($login == "ok") {
        header("location: Views\modules\inicio.php");
        //echo "<script>window.location.replace('inicio.php')</script>";
    }
}

$_SESSION["IniciarSesion"] = "ok";
