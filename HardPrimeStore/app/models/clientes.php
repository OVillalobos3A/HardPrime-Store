<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $estado = null;
    private $estado1 = null;
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

    public function setEstado($value)
    {
        $this->estado = $value;
        return true;
    }

    public function setEstado1($value)
    {
        $this->estado1 = $value;
        return true;
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getEstado1()
    {
        return $this->estado1;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado
                FROM clientes 
                WHERE nombre ILIKE ? OR direccion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado
                FROM clientes 
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function viewOrder()
    {
        $sql = 'SELECT id_pedido, pedido.estado as estado, fecha_envio, fecha_pedido, clientes.nombre as cliente, empleados.nombre as encargado, clientes.direccion as direccion
                FROM pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente
                INNER JOIN empleados ON pedido.id_empleado = empleados.id_empleado
                WHERE pedido.id_cliente = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado
                FROM clientes 
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOne1()
    {
        $this->estado1 = "Inactivo";
        $sql = 'SELECT id_cliente, nombre, estado
                FROM clientes 
                WHERE id_cliente = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $this->estado = "Activo";
        $sql = 'UPDATE clientes
                SET estado = ?
                WHERE id_cliente = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRow1()
    {
        $this->estado = "Inactivo";
        $sql = 'UPDATE clientes
                SET estado = ?
                WHERE id_cliente = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
