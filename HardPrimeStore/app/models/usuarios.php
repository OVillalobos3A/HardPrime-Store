<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    //Declarando los atributos
    private $id = null;
    private $usuario = null;
    private $clave = null;
    private $empleado = null;
    private $tipo_usuario = null;
    private $estado = null;

    //Metodos para asignar valores a los atributos

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmpleado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->empleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipo_usuario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->tipo_usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para obtener valores de los atributos.
    public function getId()
    {
        return $this->id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEmpleado()
    {
        return $this->empleado;
    }

    public function getTipo_usuario()
    {
        return $this->tipo_usuario;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    public function searchRows($value)
    {
        $sql = 'SELECT id_usuario, usuario, empleados.nombre, tipo_usuario
        FROM usuarios INNER JOIN empleados USING(id_empleado)
        INNER JOIN tipo_usuario USING(id_tipo_usuario)      
        WHERE usuario ILIKE ?
        ORDER BY usuario';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(usuario, contraseña, id_empleado, id_tipo_usuario)
                VALUES(?, ?, ?, ?)';
        $params = array($this->usuario, $hash, $this->empleado, $this->tipo_usuario);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_usuario, usuario, empleados.nombre, tipo_usuario, usuarios.estado
        FROM usuarios INNER JOIN empleados USING(id_empleado)
        INNER JOIN tipo_usuario USING(id_tipo_usuario)
        ORDER BY usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_usuario, usuario, contraseña, id_empleado, id_tipo_usuario, estado
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE usuarios
                SET usuario = ?, id_empleado = ?, id_tipo_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->usuario, $this->empleado, $this->tipo_usuario, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
