<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Empleados extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cant = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $tel = null;
    private $fecha = null;
    private $gen = null;
    private $alias = null;
    private $clave = null;
    private $ide = null;
    private $primer_uso = null;
    private $estado = null;
    private $imagen = null;
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

    public function setCant($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cant = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrimer_uso($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->primer_uso = $value;
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

    public function setIde($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->ide = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdt($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idt = $value;
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

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellido = $value;
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

    public function setTel($value)
    {
        if ($this->validatePhone($value)) {
            $this->tel = $value;
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

    public function setGen($value)
    {
        if ($this->validateGen($value)) {
            $this->gen = $value;
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

    public function setEstado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->estado = $value;
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

    public function getIde()
    {
        return $this->ide;
    }

    public function getIdt()
    {
        return $this->idt;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getPrimer_uso()
    {
        return $this->primer_uso;
    }


    public function getTel()
    {
        return $this->tel;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getGen()
    {
        return $this->gen;
    }

    public function getAlias()
    {
        return $this->alias;
    }
    public function getImagen()
    {
        return $this->imagen;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkUser($alias)
    {
        public function checkUser($alias)
        {
            $this->estado = "activo";
            $sql = 'SELECT id_usuario, last_date FROM usuarios WHERE usuario = ? and estado = ? ';
            $params = array($alias, $this->estado);
            if ($data = Database::getRow($sql, $params)) {
                $this->id = $data['id_usuario'];
                $this->alias = $alias;
                $this->fecha = $data['last_date'];
                date_default_timezone_set('America/El_Salvador');
                $date = date('Y-m-d');
                $fecha1 = new DateTime($this->fecha);
                $fecha2 = new DateTime($date);
                $rela = $fecha1->diff($fecha2);
                $this->cant = $rela->days;
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT contraseña FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['contraseña'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave_usuario = ? WHERE id_usuario = ?';
        $params = array($hash, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    public function changePass()
    {
        $primer_uso = 2;
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET contraseña = ?, primer_uso = ? WHERE id_usuario = ?';
        $params = array($hash, $primer_uso, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function readProfile()
    {
        $sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, alias_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_empleado, nombre, apellido, correo, telefono, estado, genero, estado, imagen
                FROM empleados
                WHERE nombre ILIKE ? and id_empleado <> (Select MIN(id_empleado)from empleados)';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow1()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash);
        return Database::executeRow($sql, $params);
    }

    public function firstUser()
    {
        $this->primer_uso = 0;
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $this->idt = 1;
        $sql = 'INSERT INTO usuarios(usuario, contraseña, id_empleado, id_tipo_usuario, primer_uso)
                VALUES(?,?,?,?,?)';
        $params = array($this->alias, $hash, $this->ide, $this->idt, $this->primer_uso);
        return Database::executeRow($sql, $params);
    }

    public function primerUso()
    {
        $sql = 'SELECT primer_uso FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        if ($data = Database::getRow($sql, $params)) {
            $this->primer_uso = $data['primer_uso'];
            return true;
        } else {
            return false;
        }
    }

    public function createRow()
    {
        $sql = 'INSERT INTO empleados(imagen, nombre, apellido, correo, telefono, fecha_nac, genero, estado)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->imagen, $this->nombre, $this->apellido, $this->correo, $this->tel, $this->fecha, $this->gen, $this->estado);
        if ($this->ide = Database::getLastRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    public function createFirstEmp()
    {
        $this->estado = "activo";
        $sql = 'INSERT INTO empleados(imagen, nombre, apellido, correo, telefono, fecha_nac, genero, estado)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->imagen, $this->nombre, $this->apellido, $this->correo, $this->tel, $this->fecha, $this->gen, $this->estado);
        if ($this->ide = Database::getLastRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    //Función para cargar a los empleados sin tener en cuenta el empleado root o 
    public function readAll2()
    {
        $sql = 'SELECT id_empleado, nombre, apellido, correo, telefono, genero, estado, imagen
                FROM empleados
                where id_empleado <> (Select MIN(id_empleado)from empleados)';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_empleado, nombre, apellido, correo, telefono, genero, estado, imagen
                FROM empleados';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_empleado, nombre, apellido, correo, estado, telefono, fecha_nac, genero, imagen
                FROM empleados
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOneuser()
    {
        $sql = 'SELECT nombre, apellido, correo, telefono, imagen, usuarios.id_usuario, usuario
                FROM usuarios INNER JOIN empleados ON usuarios.id_empleado = empleados.id_empleado
                WHERE usuarios.id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function readOne1()
    {
        $sql = "SELECT usuarios.id_usuario as emp, usuarios.id_empleado as empleado, nombre, apellido, imagen, CONCAT('¡BIENVENID@!', ' ', usuario) as usuario
                FROM usuarios INNER JOIN empleados ON usuarios.id_empleado = empleados.id_empleado
                WHERE usuarios.id_usuario = ?";
        $params = array($_SESSION['id_usuario']);
        return Database::getRows($sql, $params);
    }

    public function readEmfileds()
    {
        $sql = 'SELECT usuarios.id_empleado as emp, nombre, apellido, correo, telefono, imagen, usuarios.id_usuario, usuario
                FROM usuarios INNER JOIN empleados ON usuarios.id_empleado = empleados.id_empleado
                WHERE usuarios.id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;

        $sql = 'UPDATE empleados 
                SET nombre = ?, apellido = ?, correo = ?, telefono = ?, estado = ?, fecha_nac = ?, genero = ?, imagen = ?
                WHERE id_empleado= ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->tel, $this->estado, $this->fecha, $this->gen, $this->imagen, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM empleados
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateRowProfile($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->imagen) ? $this->deleteFile($this->getRuta(), $current_image) : $this->imagen = $current_image;
        $sql = 'UPDATE empleados 
                SET nombre = ?, apellido = ?, correo = ?, telefono = ?, imagen = ?
                WHERE id_empleado = ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->tel, $this->imagen, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateUserCredentials()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios 
                SET usuario = ?, contraseña = ?
                WHERE id_usuario = ?';
        $params = array($this->alias, $hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function updateUserCredentials2()
    {
        $sql = 'UPDATE usuarios 
                SET usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->alias, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */

    //Método para obtener productos por marcas
    public function cantidadProductosMarcas()
    {
        $sql = 'SELECT nombre_marca, COUNT(id_producto) cantidad
                FROM productos INNER JOIN marca USING(id_marca)
                GROUP BY nombre_marca ORDER BY cantidad DESC';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Método para obtener productos por categorias
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT categoria.nombre, COUNT(id_producto) cantidad
                FROM productos INNER JOIN categoria USING(id_categoria)
                GROUP BY categoria.nombre ORDER BY cantidad DESC
        ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Método para generar un gráfico que permita 
    //visualizar los productos ya valorados por los clientes.
    public function calificacionProductos()
    {
        $sql = 'SELECT nombre, calificacion
                FROM productos INNER JOIN calificaciones USING(id_producto)
                GROUP BY nombre, calificacion ORDER BY calificacion DESC
                FETCH FIRST 5 ROWS ONLY';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Método para generar un gráfico que permita 
    //visualizar las fechas en la cuales han existo más pedidos
    public function fechaPedidos()
    {
        $sql = 'SELECT fecha_pedido, COUNT(id_pedido) cantidad
                FROM pedido WHERE fecha_pedido IS NOT null
                GROUP BY fecha_pedido ORDER BY cantidad DESC
                FETCH FIRST 5 ROWS ONLY';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Método para generar un gráfico que permita 
    //visualizar los productos más vendidos a nivel general
    //en porcentaje

    public function productosVendidos()
    {
        $sql = 'SELECT nombre, COUNT(id_producto) cantidad
                FROM detalle_pedido INNER JOIN productos USING(id_producto)
                GROUP BY nombre ORDER BY cantidad DESC
                FETCH FIRST 5 ROWS ONLY';
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Se ingresan a la base de datos la informacion del inicio de sesión
    public function registrarSesion($fecha, $plataforma, $id)
    {
        $sql = 'INSERT INTO historial_usuarios(fecha_hora, plataforma, id_usuario)
                VALUES(?, ?, ?)';
        $params = array($fecha, $plataforma, $id);
        return Database::executeRow($sql, $params);
    }

    //Funcion para obtener el registro de inicios de sesion de un usuario.
    public function readSesiones()
    {
        $sql = 'SELECT plataforma, fecha_hora, usuarios.usuario
                FROM historial_usuarios INNER JOIN usuarios USING(id_usuario)
                WHERE id_usuario = ?
                ORDER BY fecha_hora desc;';
        $params = array($_SESSION['id_usuario']);
        return Database::getRows($sql, $params);
    }

    //Se obtiene el sistema operativo que se esta usando para el inicio de sesión
    public function getPlatform($user_agent)
    {
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
        foreach ($plataformas as $plataforma => $pattern) {
            if (preg_match('/(?i)' . $pattern . '/', $user_agent))
                return $plataforma;
        }
        return 'Otras';
    }

    public function changePassw()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function changeDate()
    {
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $sql = 'UPDATE usuarios SET last_date = ? WHERE id_usuario = ?';
        $params = array($date, $this->id);
        return Database::executeRow($sql, $params);
    }


}
