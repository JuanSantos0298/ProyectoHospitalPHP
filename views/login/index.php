<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/login.css">
</head>

<body>
    <form action="<?php echo constant('URL'); ?>login/autenticarUsuario" method="POST">
        <?php
            if(isset($this->errorLogin)){
                echo $this->errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
            <input type="text" name="idMedico" required>
        </p>
        <p>Password: <br>
            <input type="password" name="password" required>
        </p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>

</html>