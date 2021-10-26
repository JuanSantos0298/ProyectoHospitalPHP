<?php

//include "./mostrarDatos.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Importamos Bootstrap-->
    <!-- Compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Lista de Pacientes</title>
</head>

<body>
    <?php require "views/header.php" ?>
    <table class="table">
        <thead class="table-dark">
            <h2 style="text-align: center;">Listado de Pacientes</h2>
        </thead>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Edad</th>
                <th>Estado Civil</th>
                <th>Seguro Medico</th>
            </tr>
            <!--Aqui se le meteria el php para que muestre la tabla-->


        </tbody>
    </table>

</body>
<?php require "views/footer.php" ?>

</html>