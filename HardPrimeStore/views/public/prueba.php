<?php
//Se incluye la clase con las plantillas del documento
include('../../app/Helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envia el titulo de la pagina web
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>

<!--Contenedor para mostrar la card contenedora correspondiente a la página de bienvenida-->
<br>
<br>
<br>
<br>
<div class="row container">
    <div class="col s12">
        <div class="card indigo light-blue darken-4">
            <!--Defiendo el contenido de la card que contendrá las gráficas-->
            <div class="card-content white-text">
                <input class="hide" type="text" id="op" name="op"/>
                <div class="center-align" id="datos">
                    <div>
                        <h4 class="center-align">Cliente</h4>
                    </div>
                    <div class="center-align">
                        <img class="circle" height="100" src="../../resources/img/productos/60a760f16eeb7.jpg">
                    </div>
                    <div class="center-align">
                        <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar perfil" onclick="openUpdateProfile(${row.empleado})">account_circle</i>Perfil</a>
                        <a class="waves-effect waves-light btn"><i class="material-icons right tooltipped" data-tooltip="Modificar Credenciales" onclick="openUpdateCredentials(${row.id_usuario})">pin</i>Credenciales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title" class="center-align"></h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_empleado" name="id_empleado"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" name="nombre" class="validate" maxlength="25" required/>
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" name="apellido" class="validate" maxlength="25" required/>
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="email" name="correo" class="validate" maxlength="40" required/>
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="tel" type="text" name="tel" class="validate" maxlength="9" required/>
                    <label for="tel">Teléfono</label>
                </div>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn blue-grey tooltipped"  data-tooltip="Seleccione una imagen de 500x500">
                        <i class="material-icons right">image</i>Foto de perfil
                        <input id="archivo" type="file" name="archivo" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png"/>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<div id="credential-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title1" class="center-align"></h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="credential-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="number" id="id_usuario" name="id_usuario"/>
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
<div id="primer-modal" class="modal">
    <div class="modal-content">
        <h5 id="modal-title1" class="center-align">Cambiar Contraseña</h5>
        <p class="center-align">Se ha detectado una contraseña por defecto, por favor procede a cambiarla a continuación.</p>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="primer-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            
            <div class="row">                
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="primer_contra" type="password" name="primer_contra" maxlength="16" class="validate" required/>
                    <label for="ncontra">Nueva contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="primer_contra2" type="password" name="primer_contra2" maxlength="16" class="validate" required/>
                    <label for="ncontra1">Confirmar contraseña</label>
                </div>
                </div>
            </div>
            <div class="row center-align">                
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
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
                    <input class="hide" type="number" id="id_pedido" name="id_pedido"/>
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
                <span class="card-title center-align">Pedidos</span>
                <br>
                <!--Se añade un input field el cual su función es buscar un pedido en especifico-->
                <form method="post" id="search-form">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="text" name="search"  maxlength="40" required/>
                            <label for="autocomplete-input">Cliente, estado, o dirección</label>
                        </div>
                        <div class="input-field s12 m6">
                            <button class="btn red" type="submit" name="action">Buscar
                                <i class="material-icons right">search</i>
                            </button>
                            <a href="#" onclick="openTable()" class="btn waves-effect blue tooltipped" data-tooltip="Refrescar tabla"><i class="material-icons">refresh</i></a>
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
                                    <th>Fecha de realización</th>
                                    <th>Fecha de envío</th>
                                    <th>Dirección de envío</th>
                                    <th>Cliente</th>
                                    <th>Encargado</th>
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
    </div>
</div>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Sitio_Publico::footerTemplate('');
?>