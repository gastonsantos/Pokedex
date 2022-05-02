<?php
session_start();

if (!isset($_SESSION["nombre"])) { //si no esta definida la variable usuario
    header("location:index.php");
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

            <div class="d-flex align-items-center justify-content-between col-md-4 my-3 my-md-0 ">
                <h2 class="d-inline text-center h5">ADMIN: <?php echo $_SESSION["nombre"]; ?></h2>
                <btn><a href="cerrar-sesion.php" class="btn btn-primary">Cerrar Sesion</a></btn>
            </div>
</header>

<form class="container row flex-column flex-md-row my-2 mx-auto" method="post" action="detalle-pokemon.php">
    <input class="col-12 col-md-8 my-2 my-md-0" placeholder="Ingrese el nombre del pokemon" name="nombre">
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
    <?php
    include('lista-pokemones-con-sesion.php');
    ?>
    <tr>
    </tr>
    </tbody>
</table>


<script type="text/javascript" src="recursos/js/bootstrap.min.js"></script>

</body>
</html>