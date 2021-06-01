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
    private $imagen = null;
    private $direccion = null;
    private $nombre = null;
    private $apellido = null;
    private $usuario = null;
    private $contraseña = null;
    private $correo = null;
    private $celular = null;
    private $fecha = null;
    private $codigo_recu = null;
    private $ruta = '../../../resources/img/productos/';

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

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellido = $value;
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

    public function setContraseña($value)
    {
        if ($this->validatePassword($value)) {
            $this->contraseña = $value;
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

    public function setCelular($value)
    {
        if ($this->validatePhone($value)) {
            $this->celular = $value;
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

    public function setCodigo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->codigo_recu = $value;
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

    public function getEstado()
    {
        return $this->estado;
    }

    public function getEstado1()
    {
        return $this->estado1;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCodigo()
    {
        return $this->codigo_recu;
    }

    public function getRuta()
    {
        return $this->ruta;
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

    public function checkUser($usuario)
    {
        $this->estado = "activo";
        $sql = 'SELECT id_cliente, usuario FROM clientes WHERE usuario = ? and estado = ? ';
        $params = array($usuario, $this->estado);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->usuario = $data['usuario'];
            $this->alias = $usuario;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT contraseña FROM clientes WHERE id_cliente = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['contraseña'])) {
            return true;
        } else {
            return false;
        }
    }

    public function createClient()
    {
        $hash = password_hash($this->contraseña, PASSWORD_DEFAULT);
        $this->estado = "activo";
        $sql = 'INSERT INTO clientes(imagen, nombre, apellido, correo, celular, fecha_nac, direccion, estado, usuario, contraseña)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->imagen, $this->nombre, $this->apellido, $this->correo, $this->celular, $this->fecha, $this->direccion, $this->estado, $this->usuario, $hash);
        if ($this->ide = Database::getLastRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }
}
