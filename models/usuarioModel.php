    <?php

        class Usuario extends Model{
            public function __construct(){
                parent::__construct();
            }

            public function verificarUsuario(){
                //Consulta BD
                echo "Verificar datos en BD";
            }
        }

    ?>