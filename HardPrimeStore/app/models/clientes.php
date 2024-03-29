<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cant = null;
    private $estado = null;
    private $numproducts = null;
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
    private $cantidad = null;
    private $codigo_recu = null;
    private $autenticacion = null;
    private $codigo = null;
    private $intentos = null;
    
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

    public function setIntentos($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->intentos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAutenticacion($value)
    {
        if ($this->validateBoolean($value)) {
            $this->autenticacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigoAutn($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->codigo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCant($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cant = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNumproducts($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->numproducts = $value;
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

    public function setCantidad($value)
    {
        $this->cantidad = $value;
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
        if ($this->validatePass($value)) {
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

    public function getCant()
    {
        return $this->cant;
    }

    public function getNumproducts()
    {
        return $this->numproducts;
    }

    public function getAutenticacion()
    {
        return $this->autenticacion;
    }

    public function getCodigoAutn()
    {
        return $this->codigo;
    }

    public function getCantidad()
    {
        return $this->cantidad;
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

    public function getIntentos()
    {
        return $this->intentos;
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
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado, usuario
                FROM clientes 
                WHERE nombre ILIKE ? OR direccion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Método para seleccionar todos los clientes registrados
    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado, usuario
                FROM clientes 
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Método para seleccionar un pedido de un cliente en especifico
    public function viewOrder()
    {
        $sql = "SELECT id_pedido, pedido.estado as estado, fecha_pedido, clientes.direccion as direccion, ('$' || ' ' || sum(detalle_pedido.precio_producto*detalle_pedido.cantidad)) as total
                FROM pedido INNER JOIN detalle_pedido USING(id_pedido) INNER JOIN clientes USING(id_cliente)
                WHERE pedido.id_cliente = ?
                GROUP BY pedido.id_pedido, clientes.direccion";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    //Método para seleccionar un cliente
    public function readOne()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, direccion, celular, estado
                FROM clientes 
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Método para seleccionar a un cliente en especifico, cuando el estado es inactivo
    public function readOne1()
    {
        $this->estado1 = "inactivo";
        $sql = 'SELECT id_cliente, nombre, estado
                FROM clientes 
                WHERE id_cliente = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    //Método para actualizar el estado de un cliente a Activo
    public function updateRow()
    {
        $intentos = 0;
        $this->estado = "activo";
        $sql = 'UPDATE clientes
                SET estado = ?, intentos = ?
                WHERE id_cliente = ?';
        $params = array($this->estado, $intentos, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Método para actualizar el estado de un cliente a Inactivo
    public function updateRow1()
    {
        $this->estado = "inactivo";
        $sql = 'UPDATE clientes
                SET estado = ?
                WHERE id_cliente = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Método para eliminar un cliente
    public function deleteRow()
    {
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    //Método para seleccionar la información del cliente
    public function checkUser($usuario)
    {
        $this->estado = "activo";
        $sql = 'SELECT id_cliente, usuario, imagen, correo, last_date, autenticacion FROM clientes WHERE usuario = ? and estado = ? ';
        $params = array($usuario, $this->estado);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->imagen = $data['imagen'];
            $this->correo = $data['correo'];
            $this->usuario = $data['usuario'];
            $this->alias = $usuario;
            $this->fecha = $data['last_date'];
            date_default_timezone_set('America/El_Salvador');
            $date = date('Y-m-d');
            $fecha1 = new DateTime($this->fecha);
            $fecha2 = new DateTime($date);
            $rela = $fecha1->diff($fecha2);
            $this->cant = $rela->days;
            $this->autenticacion = $data['autenticacion'];            
            return true;
        } else {
            return false;
        }
    }

    //Método para seleccionar la contraseña de un cliente en especifico
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

    //Método para registrar un cliente
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

    //Método para seleccionar la cantidad de productos que tiene un clinete en especifico
    public function readCantprods()
    {
        $sql = "SELECT count(id_detalle) as cantidad
                FROM pedido INNER JOIN detalle_pedido USING(id_pedido) INNER JOIN clientes USING(id_cliente)          
                WHERE pedido.estado = 'En preparacion' AND pedido.id_cliente = ?";
        $params = array($_SESSION['id_cliente']);
        if ($data = Database::getRow($sql, $params)) {
            $this->numproducts = $data['cantidad'];
            return true;
        } else {
            return false;
        }
        
    }

    //Se ingresan a la base de datos la informacion del inicio de sesión
    public function registrarSesion($fecha, $plataforma, $id)
    {
        $sql = 'INSERT INTO historial_sesion(fecha_hora, plataforma, id_cliente)
                VALUES(?, ?, ?)';
        $params = array($fecha, $plataforma, $id);
        return Database::executeRow($sql, $params);
    }

    //Se obtiene el sistema operativo que se esta usando para el inicio de sesión
    public function getPlatform($user_agent) {
        $plataformas = array(
           'Windows 10' => 'Windows NT 10.0+',
           'Windows 8.1' => 'Windows NT 6.3+',
           'Windows 8' => 'Windows NT 6.2+',
           'Windows 7' => 'Windows NT 6.1+',
           'Windows Vista' => 'Windows NT 6.0+',
           'Windows XP' => 'Windows NT 5.1+',
           'Windows 2003' => 'Windows NT 5.2+',
           'Windows' => 'Windows otros',
           'iPhone' => 'iPhone',
           'iPad' => 'iPad',
           'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
           'Mac otros' => 'Macintosh',
           'Android' => 'Android',
           'BlackBerry' => 'BlackBerry',
           'Linux' => 'Linux',
        );
        foreach($plataformas as $plataforma=>$pattern){
           if (preg_match('/(?i)'.$pattern.'/', $user_agent))
              return $plataforma;
        }
        return 'Otras';
     }

    //Nuevas funciones implementadas
    public function changePassw()
    {
        $hash = password_hash($this->contraseña, PASSWORD_DEFAULT);
        $sql = 'UPDATE clientes SET contraseña = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function changeDate()
    {
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $sql = 'UPDATE clientes SET last_date = ? WHERE id_cliente = ?';
        $params = array($date, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function checkAutn()
    {
        $sql = 'SELECT codigo_autn FROM clientes                
                WHERE id_cliente = ?';
        $params = array($this->id);
        if ($data = Database::getRow($sql, $params)) {
            $this->codigo = $data['codigo_autn'];
            return true;
        } else {
            return false;
        }                
    }

    public function updateRecu()
    {
        $sql = 'UPDATE clientes
                SET codigo_recu = ?
                WHERE usuario= ?';
        $params = array($this->codigo, $this->usuario);
        return Database::executeRow($sql, $params);
    }

    public function updateCode()
    {
        $sql = 'UPDATE clientes
                SET codigo_autn = ?
                WHERE id_cliente = ?';
        $params = array($this->codigo, $this->id);
        return Database::executeRow($sql, $params);
    }

    function generarCodigo($longitud)
    {
        
        $caracteres = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A" , "B" , "C" , "D", "E" , "F", "E" 
        , "G", "H" , "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");


        for ($i = 1; $i <= $longitud; $i++) {
            $this->codigo .= $caracteres[$this->numero_aleatorio(0, 36)];
        }

        return $this->codigo;
    }

    function numero_aleatorio($ninicial, $nfinal)
    {
        $numero = rand($ninicial, $nfinal);

        return $numero;
    }

    public function readIntentos()
    {
        $sql = 'SELECT intentos FROM clientes WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->intentos = $data['intentos'];
            return true;
        } else {
            return false;
        }   
    }

    public function updateIntentos()
    {
        $sql = 'UPDATE clientes 
                SET intentos = ?
                WHERE usuario = ?';
        $params = array($this->intentos, $this->usuario);
        return Database::executeRow($sql, $params);
    }

    public function updateState()
    {        
        $sql = 'UPDATE clientes
                SET estado = ?
                WHERE usuario = ?';
        $params = array($this->estado, $this->usuario);
        return Database::executeRow($sql, $params);
    }

    public function checkUsuario()
    {
        $sql = 'SELECT usuario FROM clientes                
                WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->usuario = $data['usuario'];
            return true;
        } else {
            return false;
        }                
    }

    public function obtenerCorreo()
    {
        $sql = 'SELECT correo FROM clientes                
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
        $sql = 'SELECT codigo_recu FROM clientes                
                WHERE usuario = ?';
        $params = array($this->usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->codigo = $data['codigo_recu'];
            return true;
        } else {
            return false;
        }                
    }

    public function recuContra()
    {
        $hash = password_hash($this->contraseña, PASSWORD_DEFAULT);
        $intentos = 0;
        $estado = 'activo';
        $sql = 'UPDATE clientes
                SET contraseña = ?, intentos = ?, estado = ?
                WHERE usuario = ?';
        $params = array($hash, $intentos, $estado, $this->usuario);
        return Database::executeRow($sql, $params);
    }
}
