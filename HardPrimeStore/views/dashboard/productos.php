<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Productos');
?>

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Gestión de productos</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn modal-trigger" href="#modal_registro"><i class="material-icons left">add</i>Agregar producto</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Buscar producto por nombre</label>
                </div>
                <div class="input-field col s6">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">done</i></a>
                </div>
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
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
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
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
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
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
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
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal_registro" class="modal">
    <div class="modal-content">
        <h5 class="center-align">Agregar producto</h5>
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
                                <input class="file-path validate" type="text" placeholder="OBLIGATORIO">
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
                                <input class="file-path validate" type="text" placeholder="Opcional">
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
                                <input class="file-path validate" type="text" placeholder="Opcional">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 offset-s1 center-align">
                        <a class="waves-effect light-blue darken-3 btn"><i class="material-icons right">save</i>Guardar</a>
                        <a class="waves-effect red btn modal-close"><i class="material-icons right">close</i>Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('Productos.js');
?>