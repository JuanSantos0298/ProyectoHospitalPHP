<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="css\styles.css">
    <title>MedicApp</title>
</head>

<body>
    <?php
    //header("location: Views\modules\login.php");
    include "Views/modules/login.php";
    /*

    if (isset($_SESSION["IniciarSesion"]) || $_SESSION["IniciarSesion"] == "ok") {
        header("location: Views\modules\login.php");
        header("location: Views\modules\inicio.php ");
    }
*/
    ?>


</body>

</html>