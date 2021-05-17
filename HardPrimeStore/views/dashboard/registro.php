<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page1.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Registro');
?>

<div class="row container">
    <div class="col s12">
        <div class="card withe">
            <div class="card-content black-text">
                <span class="card-title center-align">Registro del primer usuario</span>
                <!-- Formulario para registrar al primer usuario del dashboard -->
                <form method="post" id="registro-form">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="nombre" type="text" name="nombre" class="validate" required/>
                            <label for="nombre">Nombres</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="apellido" type="text" name="apellido" class="validate" required/>
                            <label for="apellido">Apellidos</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="correo" type="email" name="correo" class="validate" required/>
                            <label for="correo">Correo</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="tel" type="text" name="tel" class="validate" required/>
                            <label for="tel">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="date" id="fecha" name="fecha" class="validate" required/>
                            <label for="fecha">Fecha de nacimiento</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select id="gen" name="gen">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            </select>
                            <label>Género:</label>
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
                        <div class="input-field col s12 m6">
                            <input id="alias" type="text" name="alias" class="validate" required/>
                            <label for="alias">Usuario</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="clave1" type="password" name="clave1" class="validate" required/>
                            <label for="clave1">Clave</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="clave2" type="password" name="clave2" class="validate" required/>
                            <label for="clave2">Confirmar clave</label>
                        </div>
                    </div>
                    <div class="row center-align">
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('registro.js');
?>