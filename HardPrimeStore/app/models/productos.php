<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Productos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $precio = null;
    private $imagen = null;
    private $imagen2 = null;
    private $categoria = null;
    private $proveedor = null;
    private $marca = null;
    private $stock = null;
    private $estado = null;
    private $ruta = '../../../resources/img/productos/';
    private $ruta2 = '../../../resources/img/productos/';

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

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
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

    public function setImagen2($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen2 = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function setCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setStock($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->stock = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setProveedor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMarca($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->marca = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getImagen2()
    {
        return $this->imagen2;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getRuta2()
    {
        return $this->ruta2;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_producto, productos.nombre as nombre_p, precio, productos.descripcion, stock, estado, productos.imagen, imagen2, nombre_marca, proveedor.nombre as proveedor, categoria.nombre as categ
                FROM productos INNER JOIN categoria USING(id_categoria)
                INNER JOIN marca USING(id_marca)
                INNER JOIN proveedor USING(id_proveedor)
                WHERE productos.nombre ILIKE ?
                ';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO productos(nombre, precio, descripcion, estado, stock, imagen, imagen2, id_proveedor, id_categoria, id_marca)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->precio, $this->descripcion, $this->estado, $this->stock, $this->imagen, $this->imagen2, $this->proveedor, $this->categoria, $this->marca);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_producto, productos.nombre as nombre_p, precio, productos.descripcion, stock, estado, productos.imagen, imagen2, nombre_marca, proveedor.nombre as proveedor, categoria.nombre as categ
                FROM productos INNER JOIN categoria USING(id_categoria)
                INNER JOIN marca USING(id_marca)
                INNER JOIN proveedor USING(id_proveedor)
                ORDER BY nombre_p';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readOne()
    {
        $sql = 'SELECT id_producto, nombre, precio, descripcion, stock, estado, imagen, imagen2, id_marca, id_categoria, id_proveedor
                FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    public function updateRow($current_image, $current_image2)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        ($this->imagen2) ? $this->deleteFile($this->getRuta(), $current_image2) : $this->imagen2 = $current_image2;

        $sql = 'UPDATE productos
                SET imagen = ?, imagen2 = ?, nombre = ?, precio = ?, descripcion = ?, stock = ?, estado = ?, id_proveedor = ?, id_categoria = ?, id_marca = ?
                WHERE id_producto = ?';
        $params = array($this->imagen, $this->imagen2, $this->nombre, $this->precio, $this->descripcion, $this->stock, $this->estado, $this->proveedor, $this->categoria, $this->marca, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
