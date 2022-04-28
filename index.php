<?php


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>POKEDEX</title>
    <link rel="stylesheet" type="text/css" href="recursos/css/bootstrap.min.css">

</head>
<body>

<header>
    <div class="container">
        <div class="row py-3">
            <div class="col">
                <a href="index.php"><img src="recursos/img/logo/logo.png" width="50" height="50"></a>
            </div>

            <div class="col-md-3">
                <h1 class="text-center">POKEDEXS</h1>
            </div>

            <div class="col-md-6 pt-2">
                <form class="d-flex mx-5 col-4" action="login.php" method="post">
                    <input type="text" name="usuario"  class="form-control mx-2 col-1" placeholder="usuario">
                    <input type="password" name="password" class="form-control mx-2 col-1" placeholder="contraseña">
                    <button button type="submit" class="btn btn-primary col-6">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</header>


<script type="text/javascript" src="recursos/js/bootstrap.min.js"></script>

    </body>
    </html>