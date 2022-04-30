<?php
session_start();

if(isset($_SESSION["nombre"])){//Si la variable esta definida
    header("location:pagina-con-sesion.php");
    exit();
}
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
                <h1 class="text-center">POKEDEX</h1>
            </div>

            <div class="col-md-6 pt-2">
                <form class="d-flex mx-5 col-4" action="sesion.php" method="post">
                    <input type="text" name="nombre"  class="form-control mx-2 col-1" placeholder="usuario">
                    <input type="password" name="password" class="form-control mx-2 col-1" placeholder="contraseña">
                    <button button type="submit" class="btn btn-primary col-6">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main>

    <form class="container d-flex my-2" method="post" action="detalle-pokemon.php">
        <input class="col-8" placeholder="Ingrese el nombre del pokemon" name="nombre">
        <button class="btn btn-danger col-4">Quien es este pokemon?</button>
    </form>

    <table class="table container">
        <thead class="text-center">
        <tr>
            <th scope="col">Nro</th>
            <th scope="col">Nombre</th>
            <th scope="col">Altura</th>
            <th scope="col" class="pe-5 ps-5">Peso</th>
            <th scope="col">Habilidad</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Imagen</th>
        </tr>
        </thead>
        <tbody>
        <?php include('lista-pokemones.php'); ?>
        <tr>
        </tr>
        </tbody>
    </table>
</main>

<script type="text/javascript" src="recursos/js/bootstrap.min.js"></script>

    </body>
    </html>