<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Entradas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cantidad = null;
    private $fecha = null;
    private $idemp = null;
    private $idpro = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdemp($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idemp = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdpro($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idpro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCant($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getIdemp()
    {
        return $this->idemp;
    }

    public function getIdpro()
    {
        return $this->idpro;
    }

    public function getCant()
    {
        return $this->cantidad;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = "SELECT id_entrada, productos.nombre as product, fecha, cantidad, CONCAT(empleados.nombre, ' ', empleados.apellido) as nombre
                FROM entrada INNER JOIN productos ON entrada.id_producto = productos.id_producto 
                INNER JOIN empleados ON entrada.id_empleado = empleados.id_empleado
                WHERE productos.nombre ILIKE ?
                ORDER BY productos.nombre";
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO entrada(cantidad, fecha, id_producto, id_empleado)
                VALUES(?, ?, ?, ?)';
        $params = array($this->cantidad, $this->fecha, $this->idpro, $this->idemp);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = "SELECT id_entrada, productos.nombre as product, fecha, cantidad, CONCAT(empleados.nombre, ' ', empleados.apellido) as nombre
                FROM entrada INNER JOIN productos ON entrada.id_producto = productos.id_producto 
                INNER JOIN empleados ON entrada.id_empleado = empleados.id_empleado
                ORDER BY productos.nombre";
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEmp()
    {
        $sql = 'SELECT usuarios.id_empleado as empleado, usuario
                FROM usuarios INNER JOIN empleados ON usuarios.id_empleado = empleados.id_empleado
                WHERE usuarios.id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function readAllProduct()
    {
        $sql = 'SELECT id_producto, nombre
                FROM productos';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_entrada, cantidad, fecha, id_empleado, id_producto
                FROM entrada
                WHERE id_entrada = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function backStock()
    {
        $sql = 'UPDATE productos SET stock = (productos.stock - entrada.cantidad)
                FROM entrada
                WHERE entrada.id_producto = productos.id_producto  AND id_entrada = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //TOdvaía no
    public function updateRow()
    {
        $sql = 'UPDATE entrada
                SET imagen_pr = ?, nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, estado_producto = ?, id_categoria = ?
                WHERE id_producto = ?';
        $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM entrada
                WHERE id_entrada = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
