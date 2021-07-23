<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Public_valoraciones extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $idproducto = null;
    private $idcliente = null;
    private $idetalle = null;
    private $comentario = null;
    private $fecha= null;
    private $estado = null;
    private $calificacion = null;
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
   
}
