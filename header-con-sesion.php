<header>
        <div class="container">
            <div class="row py-3">
                <div class="col">
                    <a href="index.php"><img src="recursos/img/logo/logo.png" width="50" height="50"></a>
                </div>

                <div class="d-flex align-items-center justify-content-between col-md-6 col-lg-5 col-xl-4 my-3 my-md-0 ">
                    <h2 class="d-inline text-center h5 my-0">ADMIN: <?php echo $_SESSION["nombre"]; ?></h2>
                    <btn><a href="cerrar-sesion.php" class="btn btn-primary">Cerrar Sesion</a></btn>
                </div>
    </header>