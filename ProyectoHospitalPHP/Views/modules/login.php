    <!--Establecemos nuestro div principal que mantendra centrada la caja de texto para el login-->
    <div class="inicioSesion">
        <div class="formularioLogin">
            <!--Establecemos el formulario de id y contrasena -->
            <form action="Controllers\loginControlador.php" method="post" name="formularioInicioSesion">
                <div class="TituloFormulario">Inicio de Sesion</div>
                <div class="textosInput">&#x1f464; Ingresar ID</div>
                <input type="text" class="cajaentradaTexto" id="idusuario" name="idusuario" value="">
                <div class="textosInput">&#x1f511; Ingresar contraseña</div>
                <input type="password" class="cajaentradaTexto" id="passusuario" name="passusuario" value="">

                <input type="submit" value="Iniciar sesión" class="botonInicioSesion">

            </form>
        </div>
    </div>