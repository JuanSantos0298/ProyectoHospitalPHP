<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedApp</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <?php require 'views/header.php';?>

    <div class=" slider">
        <ul class="slides">
            <li>
                <img src="public/img/4.jpg">
                <div class="caption center-align">
                    <h3 class="black-text text-lighten-3 ">Un ejemplote!</h3>
                    <h5 class="black-text text-lighten-3">Informacion</h5>
                </div>
            </li>
            <li>
                <img src="public/img/3.jpg">
                <div class="caption left-align">
                    <h3>Otro ejemplote</h3>
                    <h5 class="light grey-text text-lighten-3">Informacion</h5>
                </div>
            </li>
            <li>
                <img src="public/img/2.jpg">
                <div class="caption right-align">
                    <h3 class="">Otro ejemplote más</h3>
                    <h5 class="light grey-text text-lighten-3">Informacion</h5>
                </div>
            </li>
        </ul>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems);
        });
    </script>
    <?php require 'views/footer.php';?>
</body>

</html>