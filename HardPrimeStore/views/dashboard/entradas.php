<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Entradas');
?>

<div class="container">
    <div class="card whithe">
        <div class="card-content Black-text">
            <!--Colocamos el titulo de la card-->
            <span class="card-title center-align">Entradas</span>
            <br>
            <!--Agregamos un botón cuya función es que nos mueste el formulario para agregar-->
            <!--un registro-->
            <div>
                <a class="waves-effect red btn modal-trigger" href="#modal_registro"><i class="material-icons left">add</i>Agregar entrada</a>
            </div>
            <br>
            <!--Se añade un input field el cual su función es buscar un empleado en especifico-->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Buscar entrada por producto</label>
                </div>
                <div class="input-field col s6">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">done</i></a>
                </div>
            </div>
            <!--Se construye la tabla de datos correspondiente a entradas-->
            <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
            <!--Se especifica el detalle de cada fila y columna-->
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Empleado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Mouse Logitech G203</th>
                        <th>10</th>
                        <th>15/08/2021</th>
                        <th>Fernando Cubías</th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>GEFORCE RTX 3090</th>
                        <th>25</th>
                        <th>23/08/2021</th>
                        <th>Alejandro Muñoz</th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Memoria usb</th>
                        <th>60</th>
                        <th>27/10/2021</th>
                        <th>Mónica Acevedo</th>
                        <th>
                            <a class="btn-floating btn waves-effect light-blue darken-4 modal-trigger" href="#modal_registro"><i class="material-icons" title="Editar registro">create</i></a>
                            <a class="btn-floating btn waves-effect red" href="#"><i class="material-icons" title="Eliminar registro">delete</i></a>
                        </th>
                    </tr>
                    <tr>
                        <th>Cargador laptop universal</th>
                        <th>15</th>
                        <th>01/03/2021</th>
                        <th>Gustavo Morales</th>
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
        <h5 class="center-align">Agregar entrada</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <div class="row">
            <!--Creamos la estructura del formulario respectivo-->
            <form class="col-md-4">
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Producto</option>
                        </select>
                    </div>
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <input id="telefono" type="number" class="validate">
                        <label for="telefono">Cantidad</label>
                    </div>
                </div>
                <div class="row">
                    <!--Estableciendo el tamaño del que tomará el Input field-->
                    <div class="input-field col s12 m6">
                        <label for="fecha">Fecha de ingreso</label>
                        <input type="text" class="datepicker">
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
Dashboard_Page::footerTemplate('entradas.js');
?>