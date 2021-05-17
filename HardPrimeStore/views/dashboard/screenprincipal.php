<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Página Principal');
?>

<!--Contenedor para mostrar la card contenedora correspondiente a la página de bienvenida-->
<br>
<div class="row container">
    <div class="col s12">
            <div class="card indigo light-blue darken-4">
                <!--Defiendo el contenido de la card que contendrá las gráficas-->
                <div class="card-content white-text">
                    <!--Definiendo el nombre del encabezado-->
                    <div class="row" id="profile1"></div>
                    <h5 class="center-align">Estas son las novedades:</h5>
                    <!--Definiendo el panel número 1 para almacenar las gráficas-->
                    <!--En este caso solo son imagenes-->
                    <div class="col s12 m6">
                        <div class="card-panel blue-grey">
                            <img class="responsive-img" src="../../resources/img/Charts/chart1.PNG">
                            <h4 class="center-align">Productos más vendidos</h4>
                        </div>
                    </div>
                    <!--Definiendo el panel número 1 para almacenar las gráficas-->
                    <div class="col s12 m6">
                        <div class="card-panel blue-grey">
                            <img class="responsive-img" src="../../resources/img/Charts/chart2.PNG">
                            <h4 class="center-align">Clientes registrados</h4>
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
                    <input id="nombre" type="text" name="nombre" class="validate" required/>
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" name="apellido" class="validate" required/>
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="email" name="correo" class="validate" required/>
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="tel" type="text" name="tel" class="validate" required/>
                    <label for="tel">Teléfono</label>
                </div>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una foto de perfil de al menos 500x500">
                        <span><i class="material-icons">image</i></span>
                        <input id="archivo" type="file" name="archivo" accept=".gif, .jpg, .png"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png"/>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
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
                    <input id="alias" type="text" name="alias" class="validate" required/>
                    <label for="alias">Usuario</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">password</i>
                    <input id="contra" type="password" name="contra" class="validate" required/>
                    <label for="contra">Contraseña actual</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="ncontra" type="password" name="ncontra" class="validate" required/>
                    <label for="ncontra">Nueva contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="ncontra1" type="password" name="ncontra1" class="validate" required/>
                    <label for="ncontra1">Confirmar contraseña</label>
                </div>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('screenprincipal.js');
?>