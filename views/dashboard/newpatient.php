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
    <title>Nuevo Paciente</title>
</head>

<body>
    <?php
    include("views/header.php")
    ?>
    <div class="row">
        <h4 class="center">Registro </h4>
        <form action="newpatient/addNewPatient" class="col s12" method="POST">
            <div>
                Datos personales
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="nombre_p" type="text" class="validate">
                    <label class="active" for="nombre_paciente">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input name="apellido_p" type="text" class="validate">
                    <label class="active" for="apellido_p">Apellido paterno</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="apellido_m" type="text" class="validate">
                    <label class="active" for="apellido_m">Apellido materno</label>
                </div>
                <div class="input-field col s6">
                    <input name="edad_p" type="number" min="1" class="validate">
                    <label class="active" for="edad_p">Edad</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="direccion_p" type="text" class="validate">
                    <label class="active" for="direccion_p">Direccion</label>
                </div>
                <div class="input-field col s6">
                    <input name="telefono_p" type="tel" class="validate">
                    <label class="active" for="telefono_p">Telefono</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="seguro_p" type="text" class="validate">
                    <label class="active" for="direccion_p">Seguro medico</label>
                </div>
                <div class="input-field col s6">
                    <input name="estadoc_p" type="tel" class="validate">
                    <label class="active" for="telefono_p">Estado Civil</label>
                </div>
            </div>
            <div>
                <button class="btn waves-effect waves-light right" type="submit"
                    name="RegistrarPaciente">Registrar</button>
            </div>
            <div>
                <button class="btn waves-effect waves-light right" type="reset" name="borrarCampos">Borrar
                    campos</button>
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