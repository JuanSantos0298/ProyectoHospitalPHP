<?php
    $idPaciente = $this->d['idPaciente'];
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
    <title>Historial de Paciente</title>
</head>

<body>
    <?php
    include("views/header.php")
    ?>
    <div class="row">
        <h4 class="center">Agregar historial </h4>
        <form action="<?php echo constant('URL'); ?>clinichistorylist/register" class="col s12" method="POST">
            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
            Datos médicos
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input name="peso_paciente" type="text" min=1; class="validate">
            <label class="active" for="peso_paciente">Peso</label>
        </div>
        <div class="input-field col s5">
            <input name="altura_p" type="text" class="validate">
            <label class="active" for="altura_p">Altura (cm)</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input name="antecendentes_p" type="text" class="validate">
            <label class="active" for="antecendentes_p">Antecedentes médicos</label>
        </div>
        <div class="input-field col s5">
            <input name="motivo_p" type="text" class="validate">
            <label class="active" for="motivo_p">Motivo de consulta</label>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input name="fecha_ingreso_p" type="text" class="validate">
                <label class="active" for="fecha_ingreso_p">Fecha de ingreso</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="medicacion_p" type="text">
                <label class="active" for="medicacion_p">Medicación</label>
            </div>
            <div class="input-field col s5">
                <input name="alergias_p" type="text">
                <label class="active" for="alergias_p">Alergias</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light right" type="submit" name="Agregar">Agregar historial</button>
        <button class="btn waves-effect waves-light right" type="reset" name="BorrarCampos">Borrar campos </button>

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