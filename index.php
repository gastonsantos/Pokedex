<?php
session_start();

if (isset($_SESSION["nombre"])) {//Si la variable esta definida
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
        <div class="row align-items-center py-3">
            <div class="col-6 col-md">
                <a href="index.php"><img src="recursos/img/logo/logo.png" width="50" height="50"></a>
            </div>

            <div class="col-6 col-md-3">
                <h1 class="text-center m-0">POKEDEX</h1>
            </div>

            <div class="col-md-6 pt-2">
                <form class="d-flex flex-wrap flex-md-nowrap col col-md-4" action="sesion.php" method="post">
                    <input type="text" name="nombre" class="form-control my-2 mx-md-2 col-1" placeholder="usuario">
                    <input type="password" name="password" class="form-control my-2 mx-md-2 col-1"
                           placeholder="contraseña">
                    <button type="submit" class="btn btn-primary col my-2 ">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main>

    <form class="container row flex-column flex-md-row my-2 mx-auto" method="post" action="detalle-pokemon.php">
        <input type="text" class="col-12 col-md-8 my-2 my-md-0" placeholder="Ingrese el nombre del pokemon o número" name="buscar">
        <button class="btn btn-danger rounded-0 col-12 col-md-4 my-2 my-md-0">Quien es este pokemon?</button>
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