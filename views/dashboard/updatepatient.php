<?php
    $paciente  = $this->d['paciente'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Datos del paciente</title>
</head>

<body>
    <?php
    include("views/header.php")
    ?>
    <div class="row">
        <h5 class="center"> Paciente: <?php echo $paciente->getNombre(); ?> </h5>
        <div class="container">
            <form action="updatepatient/update" class="col s12" method="POST">
                Datos personales
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nombre_paciente" type="text" class="validate"
                            value="<?php echo $paciente->getNombre(); ?>">
                        <label class="active" for="nombre_paciente">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="apellido_p" type="text" class="validate"
                            value="<?php echo $paciente->getApellidoPaterno(); ?>">
                        <label class="active" for="apellido_p">Apellido paterno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="apellido_Mp" type="text" class="validate"
                            value="<?php echo $paciente->getApellidoMaterno(); ?>">
                        <label class="active" for="apellido_Mp">Apellido Paterno</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="telefono_p" type="number" class="validate"
                            value="<?php echo $paciente->getTelefono(); ?>">
                        <label class="active" for="telefono_p">Telefono</label>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input name="direccion_p" type="text" class="validate"
                                value="<?php echo $paciente->getDireccion(); ?>">
                            <label class="active" for="direccion_p">Dirección</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="seguro_medico_p" type="text" class="validate"
                                value="<?php echo $paciente->getSeguroMedico(); ?>">
                            <label class="active" for="seguro_medico_p">Seguro Médico</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="edad_p" type="text" value="<?php echo $paciente->getEdad(); ?>">
                            <label class="active" for="edad_p">Edad</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="estado_civil_p" type="text" value="<?php echo $paciente->getEstadoCivil(); ?>">
                            <label class="active" for="estado_civil_p">Estado Civil</label>
                        </div>
                    </div>
                    <div class="container">
                        <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIDPaciente(); ?>">

                        <button style="margin: 10px" class="btn waves-effect waves-light right" type="submit"
                            name="Agregar">Actualizar información</button>
                        <button style="margin: 10px" class="btn waves-effect waves-light right" type="reset"
                            name="BorrarCampos">Borrar campos </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        M.updateTextFields();
    });
    </script>
    <?php include("views/footer.php") ?>
</body>

</html>