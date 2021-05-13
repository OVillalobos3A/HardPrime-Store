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
            <a onclick="openCreateDialog()" class="waves-effect red btn modal-trigger" href="#"><i class="material-icons left">add</i>Agregar usuarios</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <form method="post" id="search-form">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="search" name="search" class="autocomplete" required>
                        <label for="autocomplete-input">Buscar empleado por nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <button type="submit" class="btn waves-effect tooltipped red" data-tooltip="Buscar"><i class="material-icons">check</i></button>
                    </div>
                </form>
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
                        <th>Precio ($)</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody id="tbody-rows">                                  
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title" class="center-align">Agregar producto</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <div class="row">
            <!--Creamos la estructura del formulario respectivo-->
            <form method="post" id="save-form" name="save-form" enctype="multipart/form-data" class="col-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_producto" name="id_producto" />
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="precio" type="text" name="precio" class="validate" max="9999.99" min="0.01" step="any" required>
                        <label for="precio">Precio $</label>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="stock" type="number" name="stock" data-length="150" max="999" min="1" required>
                        <label for="stock">Stock</label>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="descp" type="text" name="descp" class="validate" required>
                        <label for="descp">Descripción</label>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <select id="proveedor" name="proveedor">
                            <option value="" disabled selected>Proveedor</option>
                        </select>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <select id="categoria" name="categoria">
                            <option value="" disabled selected>Categoría</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <select id="marca" name="marca">
                            <option value="" disabled selected>Marca</option>
                        </select>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <div class="file-field input-field">
                            <div class="btn blue-grey">
                                <span>Escoger imagen</span>
                                <input type="file" id="imagen" name="imagen" accept=".gif, .jpg, .png">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png">
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
                                <input type="file" id="imagen2" name="imagen2" accept=".gif, .jpg, .png">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Opcional">
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s10 offset-s1 center-align">
                        <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                        <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
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
Dashboard_Page::footerTemplate('productos.js');
?>