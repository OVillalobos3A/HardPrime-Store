<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/



class Usuarios extends Validator
{
    //Declarando los atributos
    private $id = null;
    public $usuario = null;
    private $clave = null;
    private $empleado = null;
    private $tipo_usuario = null;
    private $estado = null;
    private $correo = null;
    private $codigo = null;



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

    public function setCorreo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->correo = $value;
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

    public function setCodigo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->codigo = $value;
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
            $this->estado = $value;
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

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }



    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    public function searchRows($value)
    {
        $sql = 'SELECT id_usuario, usuario, usuarios.estado, empleados.nombre, tipo_usuario
        FROM usuarios INNER JOIN empleados USING(id_empleado)
        INNER JOIN tipo_usuario USING(id_tipo_usuario)      
        WHERE usuario ILIKE ? and usuarios.id_tipo_usuario <> 1
        ORDER BY usuario';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $primer_uso = 1;
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(usuario, contraseña, estado, primer_uso, id_empleado, id_tipo_usuario)
                VALUES(?, ?, ?, ?, ?, ?)';
        $params = array($this->usuario, $hash, $this->estado, $primer_uso, $this->empleado, $this->tipo_usuario);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_usuario, usuario, usuarios.estado, empleados.nombre, tipo_usuario, usuarios.estado
                FROM usuarios INNER JOIN empleados USING(id_empleado)
                INNER JOIN tipo_usuario USING(id_tipo_usuario)
                where usuarios.id_tipo_usuario = 2 or usuarios.id_tipo_usuario = 3
                ORDER BY usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }
    

    public function readOne()
    {
        $sql = 'SELECT id_usuario, usuario, usuarios.estado, contraseña, id_empleado, id_tipo_usuario, estado
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE usuarios
                SET usuario = ?, estado = ?, id_empleado = ?, id_tipo_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->usuario, $this->estado, $this->empleado, $this->tipo_usuario, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function recuContra()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios
                SET contraseña = ?
                WHERE usuario = ?';
        $params = array($hash, $this->usuario);
        return Database::executeRow($sql, $params);
    }

    public function obtenerCorreo()
    {
        $sql = 'SELECT correo FROM empleados
                INNER JOIN usuarios USING(id_empleado)
                WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->correo = $data['correo'];            
            return true;
        } else {
            return false;
        }                
    }
    public function checkCode()
    {
        $sql = 'SELECT codigo_recu FROM usuarios                
                WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->codigo = $data['codigo_recu'];
            return true;
        } else {
            return false;
        }                
    }

    public function checkUser()
    {
        $sql = 'SELECT usuario FROM usuarios                
                WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->usuario = $data['usuario'];
            return true;
        } else {
            return false;
        }                
    }

    public function enviarCodigo()
    {
        $asunto = $this->getCodigo();
        mail("HardPrime@gmail.com,destinatario@gmail.com", "Recuperación de contraseña - HardPrimeStore", $asunto);
    }

    public function updateCode()
    {
        $sql = 'UPDATE usuarios
                SET codigo_recu = ?
                WHERE usuario = ?';
        $params = array($this->codigo, $this->usuario);
        return Database::executeRow($sql, $params);
    }

    function generarCodigo($longitud)
    {
        $caracteres = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");


        for ($i = 1; $i <= $longitud; $i++) {
            $this->codigo .= $caracteres[$this->numero_aleatorio(0, 9)];
        }

        return $this->codigo;
    }

    function numero_aleatorio($ninicial, $nfinal)
    {
        $numero = rand($ninicial, $nfinal);

        return $numero;
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    //Método para obtener los datos para el reporte de usuarios por su tipo de usuario
    public function readUsuariosTipo()
    {
        $sql = "SELECT usuario, tipo_usuario, (empleados.nombre || ' ' || empleados.apellido) as Empleado, correo, telefono 
                from usuarios INNER JOIN empleados ON usuarios.id_empleado = empleados.id_empleado
                INNER JOIN tipo_usuario ON usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                where tipo_usuario.id_tipo_usuario = ? and usuarios.estado = 'activo' and tipo_usuario.id_tipo_usuario > 1";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    //Método para obtener el tipo de usuario.
    public function readTipo()
    {
        $sql = 'SELECT id_tipo_usuario, tipo_usuario
        FROM tipo_usuario
        WHERE id_tipo_usuario != 1';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
