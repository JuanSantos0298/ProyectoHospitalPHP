<?php
    //Datos mandados por el controlador
    $idPaciente = $this->d['idPaciente'];
    $user       = $this->d['user'];
    $historias  = $this->d['historias'];
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
    <title>Historias clinicas</title>
</head>

<body>
    <?php include("views/header.php") ?>

    <table class="table">
        <thead class="table-dark">
            <h4 style="text-align: center;">Historias clinicas</h4>

        </thead>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Antecedentes</th>
                <th>Motivo Consulta</th>
                <th>Alergias</th>
                <th>Fecha</th>
                <th>Medicacion</th>
                <th>
                    <form action="<?php echo constant('URL')?>clinichistorylist/search" method="POST">
                        <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">

                        Buscar por fecha<input placeholder="Buscar por fecha" name="buscar_p" type="date" required>
                </th>
                <th>
                    <input class="btn waves-effect waves-light" type="submit" value="Buscar">
                    </form>
                </th>
                <th>
                    <form action="<?php echo constant('URL');?>newclinichistory" method="POST">
                        <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
                        <button class="text-danger right">&#x1f4c1;Agregar</button></a>
                    </form>
                </th>
            </tr>
            <!--Aqui se le meteria el php para que muestre la tabla-->

            <?php

            //De igual forma puedes aplicar un include de la parte del php del paciente para recuperar su id
            //o almacenarlo de forma que lo pases aqui en una variable bro. Te dejo una prueba
            /*
            $id_historial = "10000";


            $mostrarHistorial = "select * from historialmedico where historialPaciente = '$id_historial'";
            $resultado = mysqli_query($conexion, $mostrarHistorial);
            while ($mostrar = mysqli_fetch_array($resultado)) {
            */
            if(!$historias){
                echo "<p>No hay historias clinicas registradas</p>";
            }else{
                foreach($historias as $historia){
                ?>
            <tr>
                <!--Son datos de prueba, aqui se usa php para pasarle los datos del query -->
                <td><?php echo $historia->getIDHistorial(); ?></td>
                <td><?php echo $historia->getPeso(); ?></td>
                <td><?php echo $historia->getAltura(); ?></td>
                <td><?php echo $historia->getAntecedentes(); ?></td>
                <td><?php echo $historia->getMotivoConsulta(); ?></td>
                <td><?php echo $historia->getAlergias(); ?></td>
                <td><?php echo $historia->getFecha(); ?></td>
                <td><?php echo $historia->getMedicacion(); ?></td>

                <!--Aqui agregamos los botones de FontAwesome-->
                <!--Visualizar Historial-->
                <td>
                    <form action="<?php echo constant('URL'); ?>clinichistorylist/delete" method="POST">
                        <input type="hidden" name="id_eliminar" value="<?php echo $historia->getIDHistorial(); ?>">
                        <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
                        <button class="text-danger right">&#x1f5d1;Eliminar</button>
                    </form>
                </td>
                <!--Editar Datos del Paciente-->

            </tr>
            <?php
            }           
            }
            ?>

        </tbody>
    </table>

</body>
<?php include("views/footer.php"); ?>

</html>