<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Productos');
?>

<!--Contenedor para mostrar la card contenedora del formulario correspondiente a productos-->
<!--Se le asigna el id "ocultable" lo que nos permite que cuando cargue esta sección-->
<!--aparezca oculta y solo muestre la tabla de datos-->
<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card whithe">
            <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Administración de Productos</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <div class="row">
                    <!--Creamos la estructura del formulario respectivo-->
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="nombre" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="precio" type="text" class="validate">
                                <label for="precio">Precio $</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="stock" type="number" data-length="150">
                                <label for="stock">Stock</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="descp" type="text" class="validate">
                                <label for="descp">Descripción</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Proveedor</option>
                                </select>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Categoría</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Marca</option>
                                </select>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <div class="file-field input-field">
                                    <div class="btn blue-grey">
                                        <span>Escoger imagen</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                            placeholder="OBLIGATORIO">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <div class="file-field input-field">
                                    <div class="btn blue-grey">
                                        <span>Escoger imagen 2</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                            placeholder="Opcional">
                                    </div>
                                </div>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <div class="file-field input-field">
                                    <div class="btn blue-grey">
                                        <span>Escoger imagen 3</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                            placeholder="Opcional">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Asignamos los botones correspondientes para cada acción Scrud-->
            <!--Le colocamos onclick="mostrarOcultar();" a los botones para mostrar la tabla de datos-->
            <!--y esconder el formulario-->
            <!--Especificamos con un "title" lo que realiza cada botón-->
            <div class="card-action">
                <a class="btn-floating btn-large waves-effect waves-light red" title="Ingresar registro"
                    onclick="mostrarOcultar();" href="#mostrar"><i class="material-icons">add</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Modificar registro"><i
                        class="material-icons">edit</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Borrar registro"><i
                        class="material-icons">delete</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red" title="Visualizar registros"
                    onclick="mostrarOcultar();" href="#mostrar">
                    <i class="material-icons">visibility</i></a>
            </div>
        </div>
    </div>
</div>
<!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a productos-->
<!--Se le asigna el id="ocultable1" ya que esta sección(la tabla de datos) será lo que se mostrará primero-->
<div class="container" id="ocultable1">
    <div class="card whithe">
        <div class="card-content">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Visualizar Productos</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar">
                    <i class="material-icons left">add</i>Agregar producto
                </a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar una categoria en especifico-->
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">Buscar producto</label>
            </div>
            <!--Se construye la tabla de datos correspondiente a productos-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Logitech G203</th>
                        <th>Mouse gaming, sensor optico rgb.</th>
                        <th>45 unidades</th>
                        <th>$39.00</th>
                        <th>Periféricos</th>
                        <th>Logitech</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/informatica.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>GEFORCE RTX 3090</th>
                        <th>Tarjeta gráfica de última generación</th>
                        <th>25 unidades</th>
                        <th>$1700.00</th>
                        <th>Componentes</th>
                        <th>Nvida</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/informatica.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Memoria RAM GAMMIX D30D</th>
                        <th>Frecuencia 2666MHZ, DR4 8GB.</th>
                        <th>85 unidades</th>
                        <th>$52.00</th>
                        <th>Repuestos</th>
                        <th>ADATA XPG</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/informatica.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Monitor HP 25x</th>
                        <th>Monitor gaming 1080p, 144 hz, 1 ms, 24.5 pulgadas.</th>
                        <th>12 unidades</th>
                        <th>$235.00</th>
                        <th>Imagen</th>
                        <th>HP</th>
                        <th><img class="responsive-img" src="../../resources/img/Tabla/informatica.png"></th>
                        <!--Le colocamos onclick="mostrarOcultar();" al boton para mostrar el formulario-->
                        <th><a class="btn-floating btn-large waves-effect waves-light red" onclick="mostrarOcultar();"
                                href="#mostrar"><i class="material-icons" title="Editar registro">update</i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('Productos.js');
?>