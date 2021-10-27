<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedApp</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a class="brand-logo left"> MedApp</a>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a href="<?php echo constant('URL') ?>dashboard">Pacientes</a></li>
                <li class="tab"><a href="<?php echo constant('URL') ?>newpatient">Agregar nuevo paciente</a></li>
                <li class="tab"><a href="logout">Cerrar sesion</a></li>
            </ul>
        </div>
    </nav>
</body>


</html>