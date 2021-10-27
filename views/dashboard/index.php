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
                        <input placeholder="Nombre del paciente" name="clave" type="text" type="search" required>
                </th>
                <th>
                    <button type="submit">Buscar</button>
                </th>


                </form>
            </tr>
            <!--Aqui se le meteria el php para que muestre la tabla-->
            <?php
                if(count($pacientes) == 0){
                    echo "<p>No se encontraron resultados</p>";
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

            <!--Aqui agregamos los botones de FontAwesome-->
            <!--Visualizar Historial-->
            <td>
                <form action="<?php echo constant('URL'); ?>clinichistorylist" method="POST">
                    <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIDPaciente(); ?>">
                    <a href="<?php echo constant('URL'); ?>clinichistorylist"><button class="text-info">
                            &#x1f4c1;Historial Clinico</button></a>
                </form>

            </td>
            <td>
                <form action="<?php echo constant('URL'); ?>updatepatient" method="POST">
                    <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIDPaciente(); ?>">
                    <a href=""> <button class="text-info">&#x1f4dd;Editar</button></a>
                </form>
            </td>
            <td>
                <form action="<?php echo constant('URL'); ?>dashboard/deletePatient" method="POST">
                    <input type="hidden" name="id_eliminar" value="<?php echo $paciente->getIDPaciente(); ?>">
                    <button class="text-danger right">&#x1f5d1;Eliminar</button></a>
                </form>
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