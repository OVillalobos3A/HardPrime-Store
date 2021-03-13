<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard_page1.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Login');
?>

<!--Contenedor para mostrar una tabla con datos-->
<div class="row">
    <div class="col s12 m8 l4 offset-m2 offset-l4">
        <div class="card">
            <div class="card-action blue-grey darken-1 white-text">
                <h5 class="center-align">Inicio de Sesión</h5>
            </div>
            <div class="card-content">
                <div class="form-field">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_box</i>
                                    <input type="text" id="autocomplete-input" class="autocomplete">
                                    <label for="autocomplete-input">Ingrese su usuario</label>
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
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="text" id="autocomplete-input" class="autocomplete">
                                    <label for="autocomplete-input">Ingrese su contraseña</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-field center-align">
                    <a href="../dashboard/ScreenPrincipal.php">
                        <button class="btn-large blue-grey" type="submit" name="action">
                            Acceder
                            <i class="material-icons right">send</i>
                        </button>
                    </a>
                </div>
                <br>
                <div class="form-field center-align">
                    <a class="waves-effect waves-light btn blue-grey" href="../views/index2.php">¿Problemas
                        con tu
                        contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('index.js');
?>