<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/Connection.php';

class Empleado extends Connection
{
    private $ID;
    private $NombreEmp;
    private $Apellido;
    private $DepartamentoID;
    private $FechaContratacion;


    public function __construct($ID = null, $NombreEmp = null, $Apellido = null, $DepartamentoID = null, $FechaContratacion = null)
    {
        $this->ID = $ID;
        $this->NombreEmp = $NombreEmp;
        $this->Apellido = $Apellido;
        $this->DepartamentoID = $DepartamentoID;
        $this->FechaContratacion = $FechaContratacion;
        parent::__construct();
    }

    public function getAll()
    {
        try {
            // FETCH_OBJ
            $sql = $this->dbConnection->prepare("SELECT * FROM empleados");

            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function insert_empleados()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO empleados (ID, NombreEmp, Apellido, DepartamentoID, FechaContratacion)values(?,?,?,?,?)");
            $sql->bindParam(1, $this->ID);
            $sql->bindParam(2, $this->NombreEmp);
            $sql->bindParam(3, $this->Apellido);
            $sql->bindParam(4, $this->DepartamentoID);
            $sql->bindParam(5, $this->FechaContratacion);
            // Ejecutamos
            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';
            die();

        }

    }

    public function editar_empleado($ID)
{
    try
    {
        $dbempleado = $this->dbConnection->prepare("UPDATE empleados SET NombreEmp=:NombreEmp, Apellido=:Apellido, DepartamentoID=:DepartamentoID, FechaContratacion=:FechaContratacion WHERE ID=:ID");
        $dbempleado->bindParam(":ID", $ID);
        $dbempleado->bindParam(":NombreEmp", $this->NombreEmp);
        $dbempleado->bindParam(":Apellido", $this->Apellido);
        $dbempleado->bindParam(":DepartamentoID", $this->DepartamentoID);
        $dbempleado->bindParam(":FechaContratacion", $this->FechaContratacion);

        $dbempleado->execute();
        return $dbempleado;
    } catch (PDOException $ex) {
        echo '<div class="alert alert-danger container text-center" role="alert">
            <strong>ERROR EN EL SISTEMA. CONSULTE A SU TI MÁS CERCANO</strong>
        </div>';

        die();
    }
}


    public function eliminar_empleado()
    {
        try
        {
            $dbempleado = $this->dbConnection->prepare("DELETE FROM empleados where ID=:ID");
            $dbempleado->bindParam(":ID", $this->ID);
            $dbempleado->execute();
            return $dbempleado;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }

    }

    public function getItem()
    {
        try {

            $sql = $this->dbConnection->prepare("SELECT * FROM empleados WHERE ID =?");
            $sql->bindParam(1, $this->ID);
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN EL SISTEMA </strong>
    </div>';

            die();
        }
    }

    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */


    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    public function getNombreEmp()
    {
        return $this->NombreEmp;
    }
    
    /**
     * Set the value of nombre
     *
     * @return  self
     */


    public function setNombreEmp($NombreEmp)
    {
        $this->NombreEmp = $NombreEmp;
        return $this;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */


    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
        return $this;
    }

    public function getDepartamentoID()
    {
        return $this->DepartamentoID;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */


    public function setDepartamentoID($DepartamentoID)
    {
        $this->DepartamentoID = $DepartamentoID;
        return $this;
    }

    public function getFechaContratacion()
    {
        return $this->FechaContratacion;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */


    public function setFechaContratacion($FechaContratacion)
    {
        $this->FechaContratacion = $FechaContratacion;
        return $this;
    }

}   
?>