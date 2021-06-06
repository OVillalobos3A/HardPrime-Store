<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Valoraciones extends Validator
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

    public function viewComentarios()
    {        
        $sql = "SELECT comentario, calificaciones.fecha as fecha, calificaciones.estado as estado, calificacion, productos.nombre as nombre
        FROM productos INNER JOIN calificaciones USING(id_producto)
        INNER JOIN clientes USING (id_cliente)
        INNER JOIN detalle_pedido USING (id_producto)
        INNER JOIN pedido USING (id_pedido)				
        WHERE id_pedido = ? and calificaciones.id_cliente = ?";
        $params = array($this->idetalle, $this->idcliente);
        return Database::getRows($sql, $params);
    }

    public function validarComentario()
    {        
        $this->estado = 'Finalizado';
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

    public function readProm()
    {
        $sql = "SELECT ROUND(avg(calificacion),1) as calificacion
                FROM calificaciones
                WHERE id_producto = ?";
        $params = array($this->idproducto);
        return Database::getRows($sql, $params);
    }    
   
}
