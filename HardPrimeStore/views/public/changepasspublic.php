<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <div class="marine">
        <div class="container">
            <div class="container">
                <div class="col s12 m6">
                    <div class="card-panel indigo blue-grey">
                        <span class="white-text">
                            Recuerda que cada 90 días tiene que renovar su contraseña por temas de seguridad, una vez cambiadas tus credenciales podrás iniciar sesión.
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col s12 m6">
                <div class="card-panel withe">
                    <form method="post" id="save-form" name="save-form" enctype="multipart/form-data" class="col-md-4">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <input class="hide" type="text" id="usuario" name="usuario" />
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">password</i>
                                <input id="clave" type="text" name="clave" class="validate" maxlength="16" required>
                                <label for="clave">Nueva contraseña:</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">password</i>
                                <input id="confirmar" type="text" name="confirmar" class="validate" maxlength="16" required>
                                <label for="confirmar">Confirmar contraseña:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s10 offset-s1 center-align">
                                <button type="submit" class="btn waves-effect light-blue darken-4 tooltipped"
                                    data-tooltip="Guardar"><i class="material-icons">save</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Sitio_Publico::footerTemplate('change.js');
?>