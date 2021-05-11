<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Marcas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $imagen = null;
    private $logo = null;
    private $ruta = '../../../resources/img/marcas/';
    private $ruta1 = '../../../resources/img/marcas/';

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

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function setLogo($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->logo = $this->getImageName();
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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getRuta1()
    {
        return $this->ruta1;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen, logo_marca
                FROM marca
                WHERE nombre_marca ILIKE ? 
                ORDER BY nombre_marca';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO marca(nombre_marca, imagen, logo_marca)
                VALUES(?, ?, ?)';
        $params = array($this->nombre, $this->imagen, $this->logo);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen, logo_marca
                FROM marca
                ORDER BY nombre_marca';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen, logo_marca
                FROM marca
                WHERE id_marca = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        $sql = 'UPDATE marca
                SET imagen = ?, nombre_marca = ?
                WHERE id_marca = ?';
        $params = array($this->imagen, $this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRow1($current_logo)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->logo) ? $this->deleteFile($this->getRuta1(), $current_logo) : $this->logo = $current_logo;
        $sql = 'UPDATE marca
                SET logo = ?, nombre_marca = ?
                WHERE id_marca = ?';
        $params = array($this->logo, $this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRow2($current_image, $current_logo)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        ($this->logo) ? $this->deleteFile($this->getRuta1(), $current_logo) : $this->logo = $current_logo;
        $sql = 'UPDATE marca
                SET imagen = ?, logo_marca = ?, nombre_marca = ?
                WHERE id_marca = ?';
        $params = array($this->imagen, $this->logo, $this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM marca
                WHERE id_marca = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
