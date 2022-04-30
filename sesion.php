<?php

session_start();
include('conexion.php');

if(isset($_SESSION["nombre"])){//Si la variable esta definida
    header("location:pagina-con-sesion.php");
    exit();
    
}else{

    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
    //$nombre=isset($_POST['nombre'])?$_POST['nombre']:"";
    //$password=isset($_POST['password'])?$_POST['password']:"";  

    $sql = "SELECT * FROM Usuario WHERE nombre = ? AND password = ?";

    $comando = $con->prepare($sql);
    $comando->bind_param("ss", $nombre, $password);
    $comando->execute();
    $resultado = $comando->get_result();

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        $_SESSION["nombre"] = $fila["nombre"];
        header("location:pagina-con-sesion.php");
        exit();
    }else{
        //header("location:index.php");
        exit();
    }
    header("location:index.php");

}
