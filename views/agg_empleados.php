<?php
include_once '../controllers/Empleados.control.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $ID = $_POST['ID'];
    $NombreEmp = $_POST['NombreEmp'];
    $Apellido = $_POST['Apellido'];
    $DepartamentoID = $_POST['DepartamentoID'];
    $FechaContratacion = $_POST['FechaContratacion'];

    // Crea una instancia del controlador
    $controlador = new EmpleadoControl();

    // Llama a la función editar_producto para actualizar los datos del producto
    $controlador->insertEmpleado($ID, $NombreEmp, $Apellido, $DepartamentoID, $FechaContratacion);

    // Redirecciona a la página de lista de productos o a donde desees
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
        <i><h1 class="text-light">Agregar Empleado</h1></i>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-light">Nombre:</label>
                <input type="text" name="NombreEmp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Apellido:</label>
                <input type="text" name="Apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Departamento ID:</label>
                <input type="text" name="DepartamentoID" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Fecha Contratacion:</label>
                <input type="date" name="FechaContratacion" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
