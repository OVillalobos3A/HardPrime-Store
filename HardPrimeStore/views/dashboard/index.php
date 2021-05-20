<?php
//Se incluye la clase con las plantillas del documento
require_once('../../app/helpers/dashboard/dashboard_page1.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Login');
?>

<!--Contenedor para mostrar la card contenedora del login-->
<div class="row">
    <div class="col s12 m8 l4 offset-m2 offset-l4">
        <div class="card">
            <div class="card-action blue-grey darken-1 white-text">
                <!--Colocamos el titulo con la etiqueta <h5>-->
                <h5 class="center-align">Inicio de Sesión</h5>
            </div>
            <!--Defiendo el contenido de la card que contendrá el formulario de inicio de sesión-->
            <div class="card-content">
                <!--Creamos la estructura del formulario respectivo-->
                <form method="post" id="session-form">
                    <div class="form-field">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <!--Estableciendo el tamaño del que tomará el Input field-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_box</i>
                                        <input id="alias" type="text" name="alias" class="validate" maxlength="10" required />
                                        <label for="alias">Ingrese su usuario</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <!--Estableciendo el tamaño del que tomará el Input field-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input id="claveu" type="password" name="clave" class="validate"  maxlength="16" required />
                                        <label for="clave">Ingrese su contraseña</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <!--Establecemos el botón de enviar-->
                    <div class="form-field center-align">
                        <button class="btn-large blue-grey" type="submit" name="action">
                            Acceder
                            <i class="material-icons right">send</i>
                        </button>
                        </a>
                    </div>
                    <br>
                    <!--Establecemos el botón de recuperar contraseña-->
                    <div class="form-field center-align">
                        <a class="waves-effect waves-light btn blue-grey" href="../../views/dashboard/recucontra.php">
                            Recuperar contraseña
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="save-modal" class="modal">
        <div class="modal-content">
            <h5 id="modal-title" class="center-align">Agregar usuario</h5>
            <br>
            <!--Estableciendo el tamaño de cada div correspondiente-->
            <div class="row">
                <!--Creamos la estructura del formulario respectivo-->
                <form method="post" id="save-form" name="save-form" enctype="multipart/form-data" class="col-md-4">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="hide" type="text" id="usuario" name="usuario" />
                    <div class="row">
                        <!--Estableciendo el tamaño del que tomará el Input field-->
                        <div class="input-field col s12 m6">
                            <input id="clave" type="text" name="clave" class="validate"  maxlength="16" required>
                            <label for="clave">Nueva contraseña:</label>
                        </div>
                        <!--Estableciendo el tamaño del que tomará el Input field-->
                        <div class="input-field col s12 m6">
                            <input id="confirmar" type="text" name="confirmar" class="validate"  maxlength="16" required>
                            <label for="confirmar">Confirmar contraseña:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s10 offset-s1 center-align">                            
                            <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('index.js');
?>