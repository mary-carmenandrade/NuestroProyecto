<?php include 'template/header.php' ?>

<?php
  include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from cliente");
    $cliente = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona); 
?>

<style>
    body {
        color: black;
        background-color: #6c6cac;
        height: 100%;
    }

    .card {
        margin-bottom: 160px;
    }
    .carousel-dark .carousel-caption {
        color: #ecff00;
    }
</style>



<div class="container mt-5">
    <font face=”Arial”>
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 0"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="https://www.inceptivemind.com/wp-content/uploads/2020/06/SSC-Tuatara-acceleration.jpg" class="d-block w-100" alt="El auto mas veloz">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Enciende el motor</b></h5>
                                <p><b>Descubre tus limites</b></p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/NNC7TA7K2NG5HM2REZSAE244XE.jpg" class="d-block w-100" alt="Autos exoticos">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>#Chu</b></h5>
                                <p><b>Abre tus horizontes y compra un auto que te encante conducir y que vele por ti.</b></p>
                            </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://www.xtrafondos.com/descargar.php?id=9162&resolucion=3840x2160" class="d-block w-100" alt="Auto grafitiado de lujo">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>#FastCar</b></h5>
                                <p><b>Un auto diseñado para la acción es un auto diseñado para un hombre como tú</b></p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/47SKPVFJW5BLNNNTE7E4IXJTTQ.jpg" class="d-block w-100" alt="Auto Familiar">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>#ElFuturoeshoy</b></h5>
                                <p><b>Cuando compres un auto no lo compres por su precio, cómpralo por la seguridad que te ofrezca al conducirlo</b></p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar datos:
                    </div>
                    <form class="p-4" method="POST" action="registrar.php">
                        <div class="mb-3">
                            <label class="form-label">Nombres: </label>
                            <input type="text" class="form-control" name="txtNombres" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos: </label>
                            <input type="text" class="form-control" name="txtApellidos" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DNI: </label>
                            <input type="text" class="form-control" name="txtDNI" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Celular: </label>
                            <p></p>
                            <input type="text" class="form-c:ontrol" name="txtCelular" autofocus required>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-warning" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </font>
</div>

<?php include 'template/footer.php' ?>