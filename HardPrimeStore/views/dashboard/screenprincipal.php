<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/dashboard_page2.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Página Principal');
?>

<!--Contenedor para mostrar la card contenedora correspondiente a la página de bienvenida-->
<div class="row container">
    <div class="col s12">
        <div class="card indigo light-blue darken-4">
            <!--Defiendo el contenido de la card que contendrá las gráficas-->
            <div class="card-content white-text">
                <input class="hide" type="text" id="op" name="op" />
                <div class="center-align" id="datos"></div>
                <!--Definiendo el nombre del encabezado-->
                <h5 class="center-align">Estas son las novedades:</h5>
                <!--Definiendo el panel número 1 para almacenar las gráficas-->
                <!--En este caso solo son imagenes-->
                <div class="col s12 m6">
                    <div class="card-panel withe">
                        <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                        <canvas id="chart1"></canvas>
                        <h4 class="center-align black-text">Productos mejor calificados</h4>
                    </div>
                </div>
                <!--Definiendo el panel número 1 para almacenar las gráficas-->
                <div class="col s12 m6">
                    <div class="card-panel withe">
                        <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
                        <canvas id="chart2"></canvas>
                        <h4 class="center-align black-text">Productos por marca</h4>
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
            <input class="hide" type="number" id="id_empleado" name="id_empleado" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" name="nombre" class="validate" maxlength="25" required />
                    <label for="nombre">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" name="apellido" class="validate" maxlength="25" required />
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="correo" type="email" name="correo" class="validate" maxlength="40" required />
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="tel" type="text" name="tel" class="validate" maxlength="9" required />
                    <label for="tel">Teléfono</label>
                </div>
            </div>
            <div class="file-field input-field col s12 m6">
                <div class="btn blue-grey tooltipped" data-tooltip="Seleccione una imagen de 500x500">
                    <i class="material-icons right">image</i>Foto de perfil
                    <input id="archivo" type="file" name="archivo" accept=".gif, .jpg, .png" />
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Formatos aceptados: gif, jpg y png" />
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
            <input class="hide" type="number" id="id_usuario" name="id_usuario" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="alias" type="text" name="alias" class="validate" maxlength="10" required />
                    <label for="alias">Usuario</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="ncontra" type="password" name="ncontra" class="validate" maxlength="16" required />
                    <label for="ncontra">Nueva contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="ncontra1" type="password" name="ncontra1" class="validate" maxlength="16" required />
                    <label for="ncontra1">Confirmar contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">password</i>
                    <input id="contra" type="password" name="contra" class="validate" maxlength="16" required />
                    <label for="contra">Contraseña actual</label>
                </div>
                <div class="input-field col s12 m6">
                    <div class="switch">
                        <span><b>&nbsp; Autenticacion en 2 pasos: &nbsp;</b></span>
                        <label>
                            <i class="material-icons">looks_one</i>
                            <input id="autent" type="checkbox" name="autent" checked />
                            <span class="lever"></span>
                            <i class="material-icons">looks_two</i>
                        </label>
                    </div>
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
                    <input id="primer_contra" type="password" name="primer_contra" maxlength="16" class="validate" required />
                    <label for="ncontra">Nueva contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">add_moderator</i>
                    <input id="primer_contra2" type="password" name="primer_contra2" maxlength="16" class="validate" required />
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
<div id="graficos" class="modal">
    <div class="modal-content">
        <a href="#" class="btn waves-effect red accent-4 tooltipped modal-close" data-tooltip="Cerrar"><i class="material-icons">cancel</i></a>
        <h5 id="modal-title" class="center-align">Estadísticas del sistema</h5>
        <br>
        <!--Estableciendo el tamaño de cada div correspondiente-->
        <form method="post" id="graphic" enctype="multipart/form-data">
            <div class="col s12">
                <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                <canvas id="chart3"></canvas>
            </div>
            <br>
            <!--Definiendo el panel número 1 para almacenar las gráficas-->
            <div class="col s12">
                <canvas id="chart4"></canvas>
            </div>
            <div class="col s12">
                <canvas id="chart5"></canvas>
            </div>
        </form>
    </div>
</div>
<div id="sesiones-modal" class="modal">
    <div class="modal-content">
        <a href="#" class="btn waves-effect red tooltipped modal-close right-align" data-tooltip="Cerrar"><i class="material-icons">cancel</i></a>
        <div class="row">
            <h5 id="modal-title1" class="center-align"><b>Historial de inicios de sesión</b></h5>
            <br>
            <hr>
            <!--Estableciendo el tamaño de cada div correspondiente-->

            <!-- Campo oculto para asignar el id del registro al momento de modificar -->

            <div class="col s12 m12">
                <table class="responsive-table striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Fecha y hora</th>
                            <th>Plataforma</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-sesiones">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row center-align">
        </div>

    </div>
</div>
<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('main.js');
?>