<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Pedidos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $estado = null;
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

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = "SELECT id_pedido, pedido.estado as estado, fecha_pedido, (clientes.nombre || ' ' || clientes.apellido) as cliente, clientes.direccion as direccion
                FROM pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente
                WHERE clientes.nombre ILIKE ? OR pedido.estado ILIKE ? OR clientes.direccion ILIKE ?
                ORDER BY clientes";
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = "SELECT id_pedido, pedido.estado as estado, fecha_pedido, (clientes.nombre || ' ' || clientes.apellido) as cliente, clientes.direccion as direccion
                FROM pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente
                ORDER BY cliente";
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function viewShop()
    {
        $sql = 'SELECT detalle_pedido.id_pedido as id_pedido, productos.nombre as nombre, cantidad, productos.precio as precio, (productos.precio*cantidad) as subtotal, productos.imagen as imagen
                FROM detalle_pedido INNER JOIN pedido ON detalle_pedido.id_pedido = pedido.id_pedido
                INNER JOIN productos ON detalle_pedido.id_producto = productos.id_producto
                WHERE detalle_pedido.id_pedido = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = "SELECT id_pedido, pedido.estado as estado, fecha_pedido, (clientes.nombre || ' ' || clientes.apellido) as cliente, clientes.direccion as direccion
                FROM pedido INNER JOIN clientes ON pedido.id_cliente = clientes.id_cliente
                WHERE id_pedido = ?";
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOne1()
    {
        $this->estado1 = "Finalizado";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function readOne2()
    {
        $this->estado1 = "Cancelado";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $this->estado = "Finalizado";
        $sql = 'UPDATE pedido
                SET estado = ?
                WHERE id_pedido = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRowCancel()
    {
        $this->estado = "Cancelado";
        $sql = 'UPDATE pedido
                SET estado = ?
                WHERE id_pedido = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRowDelivery()
    {
        $this->estado = "Entregado";
        $sql = 'UPDATE pedido
                SET estado = ?
                WHERE id_pedido = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Funciones para la gestión de los pedidos de cliente.
    public function readPedido()
    {
        $sql = "SELECT id_pedido, pedido.estado as estado, fecha_pedido, clientes.direccion as direccion, ('$' || ' ' || sum(detalle_pedido.precio_producto*detalle_pedido.cantidad)) as total
                FROM pedido INNER JOIN detalle_pedido USING(id_pedido) INNER JOIN clientes USING(id_cliente)
                WHERE pedido.id_cliente = ? and pedido.estado <> 'En preparacion' and pedido.estado <> 'Cancelado'
                GROUP BY pedido.id_pedido, clientes.direccion";
        $params = array($_SESSION['id_cliente']);
        return Database::getRows($sql, $params);
    }

    public function readState()
    {
        $this->estado1 = "Cancelado";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function readState1()
    {
        $this->estado1 = "Finalizado";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function readState2()
    {
        $this->estado1 = "Entregado";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    public function readState3()
    {
        $this->estado1 = "En preparacion";
        $sql = 'SELECT id_pedido, estado
                FROM pedido 
                WHERE id_pedido = ? and estado = ?';
        $params = array($this->id, $this->estado1);
        return Database::getRow($sql, $params);
    }

    

}
