<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/



class tipo_usuario extends Validator
{    
    public function readAll()
    {
        $sql = 'SELECT id_tipo_usuario, tipo_usuario
        FROM tipo_usuario
        WHERE id_tipo_usuario != 1';
        $params = null;
        return Database::getRows($sql, $params);
    }


}