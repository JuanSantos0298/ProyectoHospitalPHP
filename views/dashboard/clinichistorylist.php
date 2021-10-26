<?php
    //Datos mandados por el controlador
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
            <h2 style="text-align: center;">Listado de Pacientes</h2>
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
                <th>Buscar por fecha<input placeholder="Buscar por fecha" id="buscar_p" type="date" type="search"
                        required>
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
            if(count($historias) == 0){
                echo "<p>No hay pacientes registrados</p>";
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
                <td>
                    <!--Aqui agregamos los botones de FontAwesome-->
                    <!--Visualizar Historial-->
                    <button class="text-info">&#x1f4c1;Agregar</button>

                    <!--Editar Datos del Paciente-->
                    <button class="text-info">&#x1f4dd;Editar</button>

                    <!--Eliminar-->
                    <button class="text-danger">&#x1f5d1;Eliminar</button>

                </td>
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