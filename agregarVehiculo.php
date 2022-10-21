<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
if(isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("select * from cliente where id = ?;");
    $sentencia->execute([$codigo]);
    $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    $sentencia_vehiculo = $bd->prepare("select * from vehiculo where id_cliente = ?;");
    $sentencia_vehiculo->execute([$codigo]);
    $vehiculo = $sentencia_vehiculo->fetchAll(PDO::FETCH_OBJ); 
    //print_r($persona);
}

?>

<style>
body{
    background-color: #a5a5a5;
}
/* .container{

    margin: 0;
    min-height: 100%;
    margin-bottom: 0;
    bottom: 0;
} */
.card{
    margin-bottom: 100px;
}
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos de Auto: <br><?php if(isset($_GET['codigo'])) {echo $cliente->Nombres.' '.$cliente->Apellidos.' '.$cliente->DNI;} ?>
                </div>
                <form class="p-4" method="POST" action="registrarVehiculo.php">
                    
                    <div class="mb-3">
                        <label class="form-label">Marca: </label>
                        <input type="text" class="form-control" name="txtMarca" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo: </label>
                        <input type="text" class="form-control" name="txtModelo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="int" class="form-control" name="txtPrecio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock: </label>
                        <input type="int" class="form-control" name="txtStock" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Distribuidor: </label>
                        <input type="text" class="form-control" name="txtDistribuidor" autofocus required>
                    </div>

                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $cliente->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-warning">
                    Lista de Autos
                </div>
                <div class="col-12">
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Distribuidor</th>
                                <th scope="col" colspan="7">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vehiculo as $dato) {
                            ?>
                                <tr class="table-secondary">
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->Marca; ?></td>
                                    <td><?php echo $dato->Modelo; ?></td>
                                    <td><?php echo $dato->Precio; ?></td>
                                    <td><?php echo $dato->Stock; ?></td>
                                    <td><?php echo $dato->Estado; ?></td>
                                    <td><?php echo $dato->Distribuidor; ?></td>
                                    <td><a class="text-primary" href="enviarVehiculo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>