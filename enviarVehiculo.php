<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT veh.Marca, veh.Modelo, veh.Precio, veh.Stock, veh.Estado, veh.Distribuidor, veh.id_cliente, cli.Nombres, cli.Apellidos, cli.DNI, cli.Celular
  FROM vehiculo veh
  INNER JOIN cliente cli ON cli.id = veh.id_cliente
  WHERE veh.id = ?;");
$sentencia->execute([$codigo]);
$cliente = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://whapi.io/api/send';
    $data = [
        "app" => [
            "id" => '51931816607',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$cliente->Celular
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'text',
                    "value" => 'Estimado(a) *'.strtoupper($cliente->Nombres).' '.strtoupper($cliente->Apellidos).' con DNI: '.strtoupper($cliente->DNI).' *su vehiculo ya esta listo para que usted lo recoja *'
                ]]
            ]
        ]
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    header('Location: agregarVehiculo.php?codigo='.$cliente->id_cliente);
?>