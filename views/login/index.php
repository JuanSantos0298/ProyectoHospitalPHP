<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Enlace al CSS-->
    <link rel="stylesheet" href="/css/styles.css">

    <style>
    * {
        box-sizing: border-box;
        font-family: sans-serif;
        color: black;
    }

    body {
        margin: 100px;
        padding: 0;
        background-image: radial-gradient(circle at 50% -20.71%,
                #a7deff 0,
                #6c90d8 50%,
                #38496b 100%);
    }

    .inicioSesion {
        align-items: center;
        width: 100%;
        height: 100%;
        display: grid;
    }

    .formularioLogin {
        background-color: rgba(0, 0, 0, 0.5);
        width: 400px;
        height: auto;
        position: relative;
        margin: auto;
        padding: 1em;
        border-radius: 5px;
        color: white;
        /* border:0.1em solid black; */
    }

    input {
        display: block;
        text-align: center;
        box-sizing: border-box;
    }

    .cajaentradaTexto {
        width: 80%;
        padding: 10px;
        font-size: 1em;
        border-radius: 5px;
        border: 1px solid black;
        color: black;
        font-weight: bold;
    }

    .TituloFormulario {
        text-align: center;
        font-size: 2em;
        font-weight: bold;
        padding-bottom: 0.8em;
        color: white;
    }

    .botonInicioSesion {
        width: 80%;
        padding: 10px 30px;
        cursor: pointer;
        display: block;
        margin-top: 10px;
        border: 0;
        outline: none;
        border-radius: 10px;
        border: 1px solid black;
        font-size: 16px;
        color: white;
        background-color: #4b0d0d;
        text-align: center;
        margin-top: 15%;

        font-weight: bold;
    }

    img {
        width: 150px;
    }

    .textosInput {
        text-align: left;
        font-weight: bold;
        margin-top: 2%;
        margin-bottom: 2%;
        color: white;
    }
    </style>
</head>

<body>
    <!--Establecemos nuestro div principal que mantendra centrada la caja de texto para el login-->
    <div class="inicioSesion">
        <div class="formularioLogin">
            <!--Establecemos el formulario de id y contrasena -->
            <form action="" method="post" name="formularioInicioSesion">
                <div class="TituloFormulario">Inicio de Sesion</div>
                <div class="textosInput">&#x1f464; Ingresar ID</div>
                <input type="text" class="cajaentradaTexto" id="idusuario" name="idusuario" value="">
                <div class="textosInput">&#x1f511; Ingresar contraseña</div>
                <input type="password" class="cajaentradaTexto" id="passusuario" name="passusuario" value="">
                <input type="submit" value="Iniciar sesión" class="botonInicioSesion">

            </form>
        </div>
        <p><?php 
            $this->showMessages();
        ?></p>
    </div>

</body>

</html>