<?php
include_once ("./data/UsuarioDAO.php");

session_start();

if(isset($_SESSION["nombre"])){//Si la variable esta definida
    header("location:pagina-con-sesion.php");
    exit();
    
}else{
    $dao = new UsuarioDAO();

    $name =$_POST["nombre"];
    $password =$_POST["password"];

    $dao->login($name,$password);
}
