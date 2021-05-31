<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Index extends Validator
{
    // Declaración de atributos (propiedades).

    /*
    *   Métodos para asignar valores a los atributos.
    */
    
    /*
    *   Métodos para obtener valores de los atributos.
    */
    
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

}
