<?php
    include_once '../controllers/Empleados.control.php';

    // Verificar si se ha proporcionado un ID de producto válido
    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];

        // Crear una instancia de la clase ProductoControl
        $empleado_obj = new EmpleadoControl();
        // Obtener el objeto del producto seleccionado
        $empleado = $empleado_obj->select_empleado($ID);
    } else {
        // Redireccionar a la página principal si no se proporciona un ID válido
        header('Location: list_empleados.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style="background-color: black;">
    <div class="container">
        <i><h1 class="text-light">Detalles del Empleado</h1></i>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label text-light">ID:</label>
                <input type="text" class="form-control" value="<?php echo $empleado->getID(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $empleado->getNombreEmp(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Apellido:</label>
                <input type="text" class="form-control" value="<?php echo $empleado->getApellido(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Departamento ID:</label>
                <input type="text" class="form-control" value="<?php echo $empleado->getDepartamentoID(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">FechaContratacion:</label>
                <input type="text" class="form-control" value="<?php echo $empleado->getFechaContratacion(); ?>" readonly>
            </div>
            <a class="btn btn-success" href="list_empleados.php" role="button">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
