<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Nombres = $_POST["txtNombres"];
    $Apellidos = $_POST["txtApellidos"];
    $DNI = $_POST["txtDNI"];
    $Celular = $_POST["txtCelular"];

    $sentencia = $bd->prepare("UPDATE cliente SET Nombres = ?, Apellidos = ?, DNI = ?,Celular = ? where id = ?;");
    $resultado = $sentencia->execute([$Nombres, $Apellidos, $DNI, $Celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }