<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Index extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
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
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function readMarcas()
    {
        $sql = 'SELECT id_marca, nombre_marca as marca, marca.imagen as imgmac
                FROM marca
                ORDER BY nombre_marca';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCategorias()
    {
        $sql = 'SELECT id_categoria, nombre, imagen, descripcion
                FROM categoria
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Para leer productos por marca
    public function readPM()
    {
        $sql = "SELECT nombre, id_producto,  productos.imagen as imagen, descripcion, Concat('$' || ' ' || precio) as precio
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = ? 
                ORDER BY nombre";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    //Para leer productos por categoría
    public function readPC()
    {
        $sql = "SELECT productos.nombre as nombre, id_producto,  productos.imagen as imagen, productos.descripcion as descripcion, Concat('$' || ' ' || precio) as precio
                FROM productos INNER JOIN categoria USING(id_categoria)
                WHERE id_categoria = ?
                ORDER BY nombre";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readProduct()
    {
        $sql = "SELECT nombre, id_producto, imagen, imagen2, descripcion, Concat('$' || ' ' || precio) as precio
                FROM productos
                WHERE id_producto = ? 
                ORDER BY nombre";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readTittle()
    {
        $sql = "SELECT id_marca, nombre_marca
                FROM marca
                WHERE id_marca = ? 
                ORDER BY nombre_marca";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }    

    public function tittleCateg()
    {
        $sql = "SELECT id_categoria, nombre
                FROM categoria
                WHERE id_categoria = ? 
                ORDER BY nombre";
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = "SELECT id_producto, nombre, descripcion,  Concat('$' || ' ' || precio) as precio, imagen, imagen2 
                FROM productos
                WHERE id_producto = ?";
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readProduct2()
    {
        $sql = "SELECT nombre, id_producto, imagen, imagen2, descripcion, Concat('$' || ' ' || precio) as precio
                FROM productos                
                ORDER BY nombre";
        $params = null;
        return Database::getRows($sql, $params);
    }

    
}
