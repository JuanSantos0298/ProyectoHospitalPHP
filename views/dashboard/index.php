<?php
    $user       = $this->d['user'];
    $pacientes  = $this->d['pacientes'];
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
    <div>
        <h4>Bienvenido Dr. <?php echo $user->getNombre() ?></h4>
    </div>
    <table class="table">
        <thead class="table-dark">
            <h4 style="text-align: center;">Listado de Pacientes</h4>

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
                <th>
                    <form action="<?php echo constant('URL'); ?>dashboard/searchPatient" method="POST">
                        <input placeholder="Nombre del paciente" name="clave" type="text" type="search">
                        <button type="submit">Buscar</button>
                        <a href="<?php echo constant('URL'); ?>/dashboard"><button type="button">Limpiar</button></a>


                    </form>
                </th>
            </tr>
            <!--Aqui se le meteria el php para que muestre la tabla-->
            <?php
                if(count($pacientes) == 0){
                    echo "<p>No hay pacientes registrados</p>";
                }else{
                    foreach($pacientes as $paciente){?>
            <td><?php echo $paciente->getIDPaciente(); ?></td>
            <td><?php echo $paciente->getNombre(); ?></td>
            <td><?php echo $paciente->getApellidoPaterno(); ?></td>
            <td><?php echo $paciente->getApellidoMaterno(); ?></td>
            <td><?php echo $paciente->getTelefono(); ?></td>
            <td><?php echo $paciente->getDireccion(); ?></td>
            <td><?php echo $paciente->getEdad(); ?></td>
            <td><?php echo $paciente->getEstadoCivil(); ?></td>
            <td><?php echo $paciente->getSeguroMedico(); ?></td>
            <td>
                <!--Aqui agregamos los botones de FontAwesome-->
                <!--Visualizar Historial-->
                <a href=""><button class="text-info"> &#x1f4c1;Historial</button>

                    <!--Editar Datos del Paciente-->
                    <a href=""> <button class="text-info">&#x1f4dd;Editar</button>

                        <!--Eliminar-->
                        <a href=""> <button class="text-danger center">&#x1f5d1;Eliminar</button>

            </td>
            </tr>
            <?php
                    }
                }
            ?>

        </tbody>
    </table>

</body>
<?php require "views/footer.php" ?>

</html>