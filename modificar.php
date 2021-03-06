<?php
session_start();

if (!isset($_SESSION["nombre"])) { //si no esta definida la variable usuario
    header("location:index.php");
    exit();
}
    include_once "./data/PokemonDAO.php";
    include_once "./utils/Navigation.php";

    $dao = new PokemonDAO();

    $respuesta = $dao->searchById($_GET["id"]);

        if(isset($_POST["actualizar"])){

        $id = $_GET["id"];
        $id_manual=$_POST["actualizarId"];
        $nombre = $_POST["actualizarNombre"];
        $altura = $_POST["actualizarAltura"];
        $peso = $_POST["actualizarPeso"];
        $tipo = $_POST["actualizarTipo"];
        $habilidad = $_POST["actualizarHabilidad"];

        $imgFile = $_FILES['actualizarImagen']['actualizarNombre'];
        $tmp_dir = $_FILES['actualizarImagen']['tmp_actualizarNombre'];
    
        $upload_dir = 'recursos/img/pokemons/'; 
      
        move_uploaded_file($tmp_dir,$upload_dir.$nombre.".png");

        $dao->update($id,$id_manual,$nombre,$altura,$peso,$tipo,$habilidad);

        Navigation::redirectTo("index.php");

        }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="recursos/css/bootstrap.min.css">
    <title>POKEDEX</title>
</head>

<body>

<?php
    include_once ("header-con-sesion.php")
    ?>
  


    <div class="d-flex justify-content-center">
        <form action="" class="px-5 pt-3 pb-3 bg-light" method="POST">
            <h1 class="text-center text-uppercase">Modificar</h1>
            <div class="d-flex">
                <img class="mx-auto" src="<?php echo $respuesta['imagen']?>" style="width:45%">
            </div>
            <div class="form-group">
                <label for="actualizarId">Id:</label>
                <input type="text" class="form-control" name="actualizarId"
                    value="<?php echo $respuesta["id_manual"]?>">
            </div>
            <div class="form-group">
                <label for="actualizarNombre">Nombre:</label>
                <input type="text" class="form-control" name="actualizarNombre"
                    value="<?php echo $respuesta["nombre"]?>">

            </div>
            <div class="form-group">
                <label for="actualizarAltura">Altura:</label>
                <input type="text" class="form-control" name="actualizarAltura"
                    value="<?php echo $respuesta["altura"]?>">
            </div>
            <div class="form-group">
                <label for="actualizarPeso">Peso:</label>
                <input type="text" class="form-control"  name="actualizarPeso" 
                value="<?php echo $respuesta["peso"]?>">

            </div>

            <div class="form-group">
                <label for="actualizarTipo">Tipo:</label>
                <select class="form-control" name="actualizarTipo">
                    <option value=0 selected disabled>Seleccionar tipo</option>
                    <option value=1>agua</option>
                    <option value=2>bicho</option>
                    <option value=3>electrico</option>
                    <option value=4>fuego</option>
                    <option value=5>planta</option>
                    <option value=6>veneno</option>
                    <option value=7>volador</option>
                </select>   
            </div>

            <div class="form-group">
                <label for="actualizarHabilidad">Habilidad:</label>
                <input type="text" class="form-control"  name="actualizarHabilidad" 
                value="<?php echo $respuesta["habilidad"]?>">
            </div>

            <div class="form-group mt-2">
                <label for="actualizarImagen">Imagen:</label>
                <input class="form-control" type="file" id="actualizarImagen" name="actualizarImagen" placeholder="imagen">
            </div>

            <input class="btn btn-primary mt-3 w-100" type="submit" name="actualizar" value="actualizar">

        </form>
    </div>

    <script type="text/javascript" src="recursos/js/bootstrap.min.js"></script>
</body>

</html>