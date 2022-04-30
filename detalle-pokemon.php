<?php
include_once "./data/PokemonDAO.php";
include_once "./utils/Navigation.php";

$isNamePresent = isset($_POST["nombre"]) || strlen($_POST["nombre"]) < 1;

if (!$isNamePresent) Navigation::redirectTo("index.php");

$dao = new PokemonDAO();

// quitamos espacios y ponemos en mayusculas la primer letra
$parsedName = trim(ucfirst($_POST["nombre"]));

$pokemon = $dao->getByName($parsedName);

if (!$pokemon) Navigation::redirectTo("index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>POKEDEX</title>
    <link rel="stylesheet" type="text/css" href="recursos/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="recursos/css/main.css"

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

            <?php
            if (isset($_SESSION["nombre"])) {
                echo '<div class="col-md-6 pt-2">
                            <form class="d-flex mx-5 col-4" action="sesion.php" method="post">
                                <input type="text" name="nombre" class="form-control mx-2 col-1" placeholder="usuario">
                                <input type="password" name="password" class="form-control mx-2 col-1" placeholder="contraseña">
                                <button type="submit" class="btn btn-primary col-6">Ingresar</button>
                            </form>
                    </div>';
            }
            ?>
        </div>
    </div>
</header>

<main>
    <section class="container mt-4">
        <div class="d-flex flex-column flex-md-row">

            <div class="mx-auto mx-md-0">
                <img class="m-w-300" src="<?php echo $pokemon["imagen"] ?>" alt="imagen pokemon">
            </div>

            <div class="mx-md-4 flex-fill">
                <div class="d-flex gap-5 align-items-center ">

                    <img class=" m-w-50" src="<?php echo $pokemon["tipo"] ?>" alt="tipo pokemon">

                    <div class="v-line"></div>

                    <h1 class="m-0"><?php echo $pokemon["nombre"] ?></h1>
                </div>

                <div class="py-3">
                    <p> <?php echo $pokemon["descripcion"] ?></p>
                </div>
            </div>
        </div>

        </div>
    </section>

</main>
</body>
</html>
