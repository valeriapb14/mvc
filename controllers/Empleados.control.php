<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/models/Empleado.class.php';

class EmpleadoControl
{
    private $dbConnection;

    public function __construct()
    {
    $this->dbConnection = new PDO('mysql:host=localhost; dbname=base', 'root', '');
    }
    public function insertEmpleado($ID, $NombreEmp, $Apellido, $DepartamentoID, $FechaContratacion,)
    {
        $empleado_obj = new Empleado($ID, $NombreEmp, $Apellido, $DepartamentoID, $FechaContratacion);
        $empleado = $empleado_obj->insert_empleados();
        return $empleado;
    }

    public function editar_empleado($ID, $NombreEmp, $Apellido, $DepartamentoID, $FechaContratacion)
    {
        $empleado_obj = new Empleado($ID, $NombreEmp, $Apellido, $DepartamentoID, $FechaContratacion) ;
        $empleado = $empleado_obj->editar_empleado($ID);
        return $empleado;
    }

     public function eliminar_empleado($ID)
    {
       $empleado_obj = new Empleado($ID);
       $empleado=$empleado_obj->eliminar_empleado();
       return $empleado;
    }

    public function showEmpleado($ID)
    {

        $empleado_obj = new Empleado($ID);
        $empleado = $empleado_obj->getItem();
        return $empleado;
    }

    

    public function list_empleado()
    {
        $empleado_obj = new Empleado();
        $empleados = $empleado_obj->getAll();
        return $empleados;
    }

    public function select_empleado($ID)
    {
        
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM empleados WHERE ID = ?");
        $sql->bindParam(1, $ID);
        // Ejecutamos
        $sql->execute();
        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase empleados
            $emp_obj = new Empleado($row->ID, $row->NombreEmp, $row->Apellido, $row->DepartamentoID, $row->FechaContratacion);
        }else{
            $emp_obj = null;
        }
        return $emp_obj; // Se retorna el objeto del empleado
    }

}
