<?php
//Se incluye la clase con las plantillas del documento
include('../../app/Helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Mi cuenta');
?>

<main>
    <div class="row container">
        <div class="col s12">
            <div class="card indigo light-blue darken-4">
                <!--Defiendo el contenido de la card que contendrá las gráficas-->
                <div class="card-content white-text">
                    <input class="hide" type="text" id="op" name="op" />
                    <div class="center-align" id="datos"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <!--Se especifica que se trabjará con una variante de las cards: "Tabs in Cards"-->
            <!--Se especifica el contenido de la primera sección de la Tabs in Cards-->
            <div class="card whithe" id="ocultable">
                <div class="card-content Black-text">
                    <!--Se especifica el titulo de la card-->
                    <span class="card-title center-align">Detalle del pedido</span>
                    <br>
                    <!--Se añade un boton para regresar a los pedidos-->
                    <a class="waves-effect red btn" onclick="mostrarOcultar();" href="#mostrar">
                        <i class="material-icons left">arrow_back</i>Pedidos
                    </a>
                    <br>
                    <br>
                    <!--Se construye la tabla de datos correspondiente al detalle del pedido-->
                    <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                    <!--Se especifica el detalle de cada fila y columna-->
                    <form method="post" id="form1" enctype="multipart/form-data">
                        <input class="hide" type="number" id="id_pedido" name="id_pedido" />
                        <div class="row">
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-rows1">
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <!--Contenedor para mostrar la card contenedora de la tabla de datos correspondiente a pedidos.-->
            <!--Se le asigna el id "ocultable1" lo que nos permite que cuando cargue esta sección desaparezca-->
            <!--la sección número 1-->
            <div class="card whithe" id="ocultable1">
                <div class="card-content Black-text">
                    <span class="card-title center-align"><b>Historial de pedidos realizados</b></span>
                    <br>
                    <!--Se añade un input field el cual su función es buscar un pedido en especifico-->
                    <form method="post" id="search-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">search</i>
                                <input id="search" type="text" name="search" maxlength="40" required />
                                <label for="autocomplete-input">Código o estado del pedido</label>
                            </div>
                            <div class="input-field s12 m6">
                                <button class="btn red" type="submit" name="action">Buscar
                                    <i class="material-icons right">search</i>
                                </button>
                                <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped"
                                    data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
                            </div>
                        </div>
                    </form>
                    <!--Se construye la tabla de datos correspondiente a pedidos-->
                    <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                    <!--Se especifica el detalle de cada fila y columna-->
                    <form method="post" id="save-form" enctype="multipart/form-data">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <div class="row">
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Código pedido</th>
                                        <th>Estado</th>
                                        <th>Fecha del pedido</th>
                                        <th>Dirección de envío</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-rows">
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card whithe" id="ocultable_2">
                <div class="card-content Black-text">
                    <!--Se especifica el titulo de la card-->
                    <span class="card-title center-align"><b>Historial de comentarios realizados</b></span>
                    <br>
                    <!--Se construye la tabla de datos correspondiente a los comentarios del cliente-->
                    <!--Se especifica la clase para hacer responsive la tabla, y el tipo de tabla-->
                    <!--Se especifica el detalle de cada fila y columna-->
                    <form method="post" id="form2" enctype="multipart/form-data">
                        <input class="hide" type="number" id="id_pedido" name="id_pedido" />
                        <div class="row">
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th class="center align">Producto</th>
                                        <th class="center align">Estado</th>
                                        <th class="center align">Calificación</th>
                                        <th class="center align">Fecha</th>
                                        <th class="center align">Comentario</th>
                                        <th class="center align">Editar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-rows_2">
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div id="comment-modal" class="modal">
                <div class="modal-content">
                    <!-- Título para la caja de dialogo -->
                    <h4 class="center-align">Editar valoración</h4>
                    <!-- Formulario para cambiar la cantidad de producto -->
                    <form method="post" id="comment-form" enctype="multipart/form-data">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <input class="hide" type="date" id="fecha" name="fecha" />
                        <input type="text" id="id_calificacion_act" name="id_calificacion_act" class="hide" />
                        <div class="row">
                            <div class="input-field col s12 m10">
                                <i class="material-icons prefix">stars</i>
                                <select id="calificacion" name="calificacion" required>
                                    <option value="" disabled selected>Elige una calificación</option>
                                    <option value="1">1 estrellas</option>
                                    <option value="2">2 estrellas</option>
                                    <option value="3">3 estrellas</option>
                                    <option value="4">4 estrellas</option>
                                    <option value="5">5 estrellas</option>
                                </select>
                            </div>
                            <div class="input-field col s12 m12">
                                <h6>Escribe tu comentario:</h6>
                                <textarea id="comentario" name="comentario" class="materialize-textarea black-text"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                                    class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i
                                    class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="credential-modal" class="modal">
        <div class="modal-content">
            <h5 id="modal-title1" class="center-align"></h5>
            <br>
            <!--Estableciendo el tamaño de cada div correspondiente-->
            <form method="post" id="credential-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_cliente" name="id_cliente"/>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="alias" type="text" name="alias" class="validate" maxlength="10" required/>
                        <label for="alias">Usuario</label>
                    </div>
                    
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">add_moderator</i>
                        <input id="ncontra" type="password" name="ncontra" class="validate" maxlength="16" required/>
                        <label for="ncontra">Nueva contraseña</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">add_moderator</i>
                        <input id="ncontra1" type="password" name="ncontra1" class="validate" maxlength="16" required/>
                        <label for="ncontra1">Confirmar contraseña</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">password</i>
                        <input id="contra" type="password" name="contra" class="validate" maxlength="16" required/>
                        <label for="contra">Contraseña actual</label>
                    </div>
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
Sitio_Publico::footerTemplate('mi_cuenta.js');
?>