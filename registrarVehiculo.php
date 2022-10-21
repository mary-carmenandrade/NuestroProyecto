<?php
print_r($_POST);
 if (empty($_POST["txtMarca"]) || empty($_POST["txtModelo"])||empty($_POST["txtPrecio"])||empty($_POST["txtStock"])||empty($_POST["txtEstado"])||empty($_POST["txtDistribuidor"])) {
    header('Location: index.php');
    exit();
} 

include_once 'model/conexion.php';
$Marca = $_POST["txtMarca"];
$Modelo = $_POST["txtModelo"];
$Precio = $_POST["txtPrecio"];
$Stock = $_POST["txtStock"];
$Estado = $_POST["txtEstado"];
$Distribuidor = $_POST["txtDistribuidor"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO vehiculo(Marca,Modelo,Precio,Stock,Estado,Distribuidor,id_cliente) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$Marca, $Modelo, $Precio, $Stock, $Estado, $Distribuidor, $codigo]);

if ($resultado === TRUE) {
    header('Location: agregarVehiculo.php?codigo='.$codigo);
}
