<?php

session_start();

class Modelos
{
    public $id_medico;
    public $password_medico;
    public function Ingresar($idvar, $passwordvar)
    {

        //Establecemos nuestra variable de conexion a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "hospitalphp");

        $id_medico = $idvar;
        $password_medico = $passwordvar;

        $loginquery = "select id_medico,password from medico where id_medico = '$id_medico' && password = '$password_medico'";

        $consulta = mysqli_query($conexion, $loginquery);

        $filas = mysqli_num_rows($consulta);

        if ($filas) {
            $var1 =  "ok";
            header('location: Views\modules\inicio.php');
        } else {
            header('location: Views\modules\error.php');
        }
        return $var1;
    }
}
