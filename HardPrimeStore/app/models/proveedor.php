<?php
/*
*	Clase para manejar la tabla proveedores de la base de datos. Es clase hija de Validator.
*/
class Proveedores extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $direction = null;
    private $tel = null;

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

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDirection($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->direction = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTel($value)
    {
        if ($this->validatePhone($value)) {
            $this->tel = $value;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function getTel()
    {
        return $this->tel;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_proveedor, nombre, correo, direccion, telefono
                FROM proveedor
                WHERE nombre ILIKE ? OR direccion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO proveedor(nombre, correo, direccion, telefono)
                VALUES(?, ?, ?,?)';
        $params = array($this->nombre, $this->correo, $this->direction, $this->tel);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_proveedor, nombre, correo, direccion, telefono
                FROM proveedor
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_proveedor, nombre, correo, direccion, telefono
                FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE proveedor
                SET nombre = ?, correo = ?, direccion = ?, telefono = ?
                WHERE id_proveedor = ?';
        $params = array($this->nombre, $this->correo, $this->direction, $this->tel, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
