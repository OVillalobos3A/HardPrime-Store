<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Valoraciones extends Validator
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
        $sql = 'SELECT id_calificacion, comentario, fecha, calificacion, calificaciones.estado as estado, productos.nombre as producto, clientes.nombre as cliente
                FROM calificaciones INNER JOIN productos ON calificaciones.id_producto = productos.id_producto
                INNER JOIN clientes ON calificaciones.id_cliente = clientes.id_cliente
                WHERE clientes.nombre ILIKE ? OR productos.nombre ILIKE ?
                ORDER BY clientes.nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_calificacion, comentario, fecha, calificacion, calificaciones.estado as estado, productos.nombre as producto, clientes.nombre as cliente
                FROM calificaciones INNER JOIN productos ON calificaciones.id_producto = productos.id_producto
                INNER JOIN clientes ON calificaciones.id_cliente = clientes.id_cliente
                ORDER BY clientes.nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_calificacion, comentario, fecha, calificacion, calificaciones.estado as estado, productos.nombre as producto, clientes.nombre as cliente
                FROM calificaciones INNER JOIN productos ON calificaciones.id_producto = productos.id_producto
                INNER JOIN clientes ON calificaciones.id_cliente = clientes.id_cliente
                WHERE id_calificacion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOne1()
    {
        $this->estado1 = "Deshabilitado";
        $sql = 'SELECT id_calificacion, comentario, estado
                FROM calificaciones 
                WHERE id_calificacion = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $this->estado = "Habilitado";
        $sql = 'UPDATE calificaciones
                SET estado = ?
                WHERE id_calificacion = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRow1()
    {
        $this->estado = "Deshabilitado";
        $sql = 'UPDATE calificaciones
                SET estado = ?
                WHERE id_calificacion = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM calificaciones
                WHERE id_calificacion = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
