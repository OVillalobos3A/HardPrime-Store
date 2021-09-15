<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Public_valoraciones extends Validator
{
    // Declaración de atributos (propiedades).
    private $alias = null;
    private $clave = null;
    private $id = null;
    private $idproducto = null;
    private $idcliente = null;
    private $idetalle = null;
    private $comentario = null;
    private $fecha= null;
    private $estado = null;
    private $calificacion = null;
    private $autenticacion = null;
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

    public function setAlias($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->alias = $value;
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


    public function setClave($value)
    {
        if ($this->validatePass($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdcliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idcliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdproducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idproducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idetalle = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCalificacion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->calificacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setComentario($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->comentario = $value;
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

    public function setEstado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->estado = $value;
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

    public function getIdproducto()
    {
        return $this->idproducto;
    }

    public function getIdcliente()
    {
        return $this->idcliente;
    }

    public function getIdetalle()
    {
        return $this->idetalle;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getAutenticacion()
    {
        return $this->autenticacion;
    }

    //Método para insertar una calificación en la base de datos
    public function createRow()
    {
        $sql = 'INSERT INTO calificaciones(comentario, fecha, calificacion, id_producto, id_cliente)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->comentario, $this->fecha, $this->calificacion, $this->idproducto, $this->idcliente);
        if (Database::getLastRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    //Método para seleccionar los comentarios de un producto en especifico, siempre y cuando esten habilitados
    public function readComments()
    {
        $this->estado = 'Habilitado';
        $sql = "SELECT comentario, fecha, calificaciones.estado as estado, calificacion, id_producto, clientes.usuario, clientes.imagen
                FROM calificaciones INNER JOIN clientes USING(id_cliente)
                WHERE id_producto = ? and calificaciones.estado = ?
                ORDER BY fecha";
        $params = array($this->idproducto, $this->estado);
        return Database::getRows($sql, $params);
    }

    //Método para seleccionar las calificaciones que ha realizado un cliente en especifico
    public function viewComentarios()
    {        
        $sql = 'SELECT calificaciones.id_calificacion as id_calificacion, comentario, calificaciones.fecha as fecha, calificaciones.estado as estado, calificacion, productos.nombre as nombre
        FROM productos INNER JOIN calificaciones USING(id_producto)
        INNER JOIN clientes USING (id_cliente)              		
        WHERE calificaciones.id_cliente = ?
        ORDER BY calificaciones.fecha';
        $params = array($this->idcliente);
        return Database::getRows($sql, $params);
    }

    //Método para seleccionar una calificación en especifico mediante su ID
    public function readOne()
    {        
        $sql = 'SELECT id_calificacion, calificacion, comentario, fecha, estado 
                FROM calificaciones
                WHERE id_calificacion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
   
    //Método para actualizar una calificación en la base de datos
    public function updateComentario()
    {
        $this->estado = 'Deshabilitado';
        $sql = 'UPDATE calificaciones
                SET comentario = ?, calificacion = ?, estado = ?, fecha = ?
                WHERE id_calificacion = ?';
        $params = array($this->comentario, $this->calificacion, $this->estado, $this->fecha, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Método para validar que un cliente no pueda ingresar una calificación a un producto si este no lo ha comprado
    public function validarComentario()
    {        
        $this->estado = 'Entregado';
        $sql = "SELECT pedido.id_cliente as id_cliente
                FROM productos	INNER JOIN detalle_pedido USING(id_producto)
                INNER JOIN pedido USING(id_pedido)
                WHERE productos.id_producto = ? and pedido.id_cliente = ? and pedido.estado = ?";
        $params = array($this->idproducto, $this->idcliente, $this->estado);
        if ($data = Database::getRow($sql, $params)) {                                
            return true;
        } else {
            return false;
        }  
    }

    //Método para validar que un cliente no pueda realizar dos comentarios en el mismo producto
    public function unComentario()
    {        
        $sql = "SELECT id_calificacion 
                FROM calificaciones
                WHERE id_cliente = ? and id_producto = ?";
        $params = array($this->idcliente, $this->idproducto);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_calificacion'];
            return true;
        } else {
            return false;
        }  
    }

    //Metodo para seleccionar el promedio de calificaciones de un producto
    public function readProm()
    {
        $sql = "SELECT ROUND(avg(calificacion),1) as calificacion
                FROM calificaciones
                WHERE id_producto = ?";
        $params = array($this->idproducto);
        return Database::getRows($sql, $params);
    }    

    public function openName()
    {
        $sql = "SELECT id_cliente as emp, imagen, CONCAT('¡BIENVENID@!', ' ', usuario) as usuario
                FROM clientes 
                WHERE id_cliente = ?";
        $params = array($_SESSION['id_cliente']);
        return Database::getRows($sql, $params);
    }

    public function readEmfileds()
    {
        $sql = 'SELECT id_cliente as emp, usuario, id_cliente, autenticacion
                FROM clientes
                WHERE id_cliente = ?';
        $params = array($_SESSION['id_cliente']);
        return Database::getRow($sql, $params);
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

    public function updateUserCredentials()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE clientes 
                SET usuario = ?, contraseña = ?, autenticacion = ?
                WHERE id_cliente = ?';
        $params = array($this->alias, $hash, $this->autenticacion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateUserCredentials2()
    {
        $sql = 'UPDATE clientes 
                SET usuario = ?, autenticacion = ?
                WHERE id_cliente = ?';
        $params = array($this->alias, $this->autenticacion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function changePassw()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
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
}
