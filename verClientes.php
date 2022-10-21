<body>
    <header>
        <?php
        require_once('template/header.php')
        ?>
    </header>

    <?php
    include_once "model/conexion.php";
    $sentencia = $bd->query("select * from cliente");
    $cliente = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
    ?>
    <style>
        body {
            background-color: #a9a9a9;
        }
        .card{
            margin-bottom: 210px;
        }
    </style>
    <div class="container mt-5">
        <font face=”Arial”>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- inicio alerta -->
                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Rellena todos los campos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado!</strong> Se agregaron los datos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>



                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Vuelve a intentar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>



                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cambiado!</strong> Los datos fueron actualizados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Eliminado!</strong> Los datos fueron borrados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- fin alerta -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <b>Lista de clientes</b>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle table-success">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col" colspan="3">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($cliente as $dato) {
                                    ?>

                                        <tr class="table-info">
                                            <td scope="row"><?php echo $dato->id; ?></td>
                                            <td><?php echo $dato->Nombres; ?></td>
                                            <td><?php echo $dato->Apellidos; ?></td>
                                            <td><?php echo $dato->DNI; ?></td>
                                            <td><?php echo $dato->Celular; ?></td>
                                            <td><a class="text-warning" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a class="text-primary" href="agregarVehiculo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-bicycle"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
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
        </font>
    </div>
</body>
<?php include 'template/footer.php' ?>