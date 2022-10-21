<?php
$contraseña = "uKbW224!Ad%K";
$usuario = "grupo5";
$nombre_bd="grupo5";
try {
    $bd = new PDO(
        'mysql:host=bdmysql.testing-apps.com;
        dbname='.$nombre_bd,
        $usuario,
        $contraseña,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch(Exception $e){
    echo"Problema con la conexion".$e->getMessage();
}
