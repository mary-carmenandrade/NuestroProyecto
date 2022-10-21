<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtDNI"]) || empty($_POST["txtCelular"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$Nombres = $_POST["txtNombres"];
$Apellidos = $_POST["txtApellidos"];
$DNI = $_POST["txtDNI"];
$Celular = $_POST["txtCelular"];

$sentencia = $bd->prepare("INSERT INTO cliente(Nombres,Apellidos,DNI,Celular) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$Nombres, $Apellidos, $DNI, $Celular]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
