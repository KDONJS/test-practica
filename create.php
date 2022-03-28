<?php

$mensaje = "";

if(isset($_POST['guardar'])){

require 'data.php';

$cliente = new Cliente();

$cliente->setNombre($_POST['nombre']);
$cliente->setApellido($_POST['apellido']);
$cliente->setDireccion($_POST['direccion']);
$cliente->setTelefono($_POST['telefono']);
$cliente->setCorreo($_POST['correo']);

$db = new Data();
$respues = $db->create($cliente);

if($respues){
    $mensaje = "cliente registrado";
    $clase = "alert alert-success";
}else{
    $mensaje = "cliente ya existe";
    $clase = "alert alert-danger";
}

// print_r($_POST);
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetst</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="col-sm-8">
                    <h2>Nuevo <strong>cliente</strong></h2>
                </div>
                <div class="col-sm-4">
                    <a href="index.php" class="btn btn-info add-new"><i-fa class="fa fa-arrow-left"></i-fa> Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="" method="POST" >

                <div class="col-md-6">
                    <label for="Nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="Nombre" maxlength="60" required>
                </div>

                <div class="col-md-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" maxlength="60" required>
                </div>

                <div class="col-md-12">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" id="direccion" maxlength="60" required>
                </div>

                <div class="col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" maxlength="60" required>
                </div>
                
                <div class="col-md-6">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" class="form-control" id="correo" maxlength="60" required>
                </div>

                <div class="col-md-12 pull-right">
                        <hr>
                        <button name="guardar" class="btn btn-success">Guardar cliente</button>
                </div>

            </form>
        </div>

            <hr>
            <div class="row">
                <div class="<?php  echo $clase ?>">
                        <span><?php echo $mensaje?></span>
                </div>
            </div>

    </div>
</body>
</html>