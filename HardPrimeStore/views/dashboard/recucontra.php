<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page1.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Recu-contraseña');
?>

<!--Contenedor para mostrar el div contenedor a la card en la cual se muestra:-->
<!--el formulario de recuperar contraseña.-->
<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card whithe">
             <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <a class="waves-effect blue-grey btn" href="../../views/dashboard/index.php">
                    <i class="material-icons left">arrow_back</i>Login
                </a>
                <br>
                <br>
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Recuperación de contraseña</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <!--Creamos la estructura del formulario respectivo-->
                <div class="row">
                    <form class="col-md-4">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="usuario" type="text" class="validate">
                                <label for="usuario">Ingrese su usuario:</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <button class="btn waves-effect blue-grey" type="submit" name="action">Enviar código
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12">
                                <p class="justificado">Se ha enviado un código de confirmación al correo electrónico
                                    asociado a esta cuenta, por favor revisa tu bandeja de entrada y procede a cambiar
                                    tu contraseña.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="usuario" type="text" class="validate">
                                <label for="usuario">Ingrese el código de confirmación:</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="usuario" type="text" class="validate">
                                <label for="usuario">Nueva contraseña:</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="usuario" type="text" class="validate">
                                <label for="usuario">Confirmar contraseña:</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <button class="btn waves-effect blue-grey disabled" type="submit" name="action">Cambiar
                                    contraseña
                                    <i class="material-icons right">edit</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('Recuperacion');
?>