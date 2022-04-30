<?php  
   $config = parse_ini_file("config.ini");
   $con = new mysqli($config["host"],$config["usuario"],$config["clave"],$config["base"]) or die("error de conexion".mysql_error());