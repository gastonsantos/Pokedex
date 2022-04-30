<?php
session_start();
include('conexion.php');

if(!isset($_SESSION["nombre"])){ //si no esta definida la variable usuario
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

            <div class="col-md-3">
                <btn><a href="cerrar-sesion.php" class="btn btn-primary">Cerrar Sesion</a></btn>
                <h3 class="text-center">ADMIN: <?php  echo $_SESSION["nombre"];   ?></h3>
            </div>

       

</header>


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



      
            $sql="SELECT * FROM Pokemons";
        

            //include('lista-pokemones.php');
            include('lista-pokemones-con-sesion.php');

        ?>
        <tr>
        </tr>
        </tbody>
    </table>




<script type="text/javascript" src="recursos/js/bootstrap.min.js"></script>

    </body>
    </html>