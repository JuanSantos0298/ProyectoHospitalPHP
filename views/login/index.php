<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
    /* Bordered form */
    form {
        border: 3px solid #f1f1f1;
    }

    /* Full-width inputs */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    /* The "Forgot password" text */
    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }


    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* The "Forgot password" text */
    span.registrar {
        float: right;
        padding-top: 16px;
    }
    </style>
</head>

<body>
    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="vistaLogin.php" class="brand-logo left center"> Iniciar sesión</a>
        </div>
    </nav>
    <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST">
        <div class="container">
            <div class="col s4">
                <label for="id_Medico"><b>ID</b></label>
                <input type="text" placeholder="Ingresa ID" name="id_Medico" required>
            </div>
            <div class="col s4">

            </div>
            <div class="col s4">
                <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Ingrese contraseña" name="pass" required>
            </div>

            <button type="submit">Ingresar</button>
            <span class="registrar"><a href="<?php echo constant('URL'); ?>signup">Crear cuenta nueva</a></span>
            <?php $this->showMessages(); ?>

        </div>
    </form>
</body>

</html>