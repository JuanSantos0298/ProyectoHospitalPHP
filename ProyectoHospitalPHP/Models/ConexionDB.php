<?php

include('Controller/inicioSesionControlador.php');

//En esta clase establecemos nuestra conexion a la base de datos
class Conexion
{

    //Defini mis variables necesarias para el login
    public $idlogin;
    public $passlogin;

    //Establecemos nuestra varable conexion 
    private $conexion;

    //Inicializamos la conexion a la BD con el constructor
    public function __construct()
    {
        $this->conexion = new mysqli('localhost', 'root', '', 'hospitalphp');
    }

    public function iniciarSesion($idlogin, $passlogin)
    {
        $query = $this->conexion->query("select * from medico where id_medico = '$idlogin' && password = '$passlogin'");
        $num = mysqli_num_rows($query);

        return $num;

        if ($num == 0)
            echo "Chingo a su madre";
        else
            echo "No es cierto perro, si lo encontro.";
    }
}
