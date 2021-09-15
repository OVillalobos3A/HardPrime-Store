<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Recuperar contraseña');
?>

<main>
    <div class="row">
        <div class="col s12 m12">
            <div class="container">
                <!--Boton para regresar al login-->
                <br><a class="waves-effect orange darken-4 btn" href="login.php"><i class="material-icons right">undo</i>Regresar al login</a>
                <h4>Recuperación de contraseña</h4>
                <hr>
                <!--Card en la que el cliente ingresa su usuario para que se le envie el código de confirmación-->
                <div class="card">
                    <form method="post" id="save-form" name="save-form" enctype="multipart/form-data" maxlength="10" class="col-md-4">
                        <div class="card-content black-text">
                            <div class="row">
                                <div class="col s12 m4">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">person</i>
                                            <input placeholder="" id="usuario" name="usuario" type="text" class="validate" required>
                                            <label for="usuario">Ingrese su usuario</label>
                                        </div>
                                    </div>

                                </div>
                                <!--Boton para enviar el código de confirmación y habilitar el cambio de contraseña-->

                                <br>&nbsp;&nbsp;<button class="waves-effect orange darken-4 btn" type="submit" id="action" name="action"><i class="material-icons right">email</i>Enviar código</button>
                            </div>
                            <b>Se ha enviara código de confirmación a tu correo electronico asociado con este usuario, por favor revisa tu bandeja de entrada y procede a cambiar tu contraseña.</b>
                        </div>
                        <div class="card-action" id="btnconfirmar">
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="container">
                    <!--Card en la que el cliente ingresa el código de confirmación y cambia su contraseña-->
                    <div class="card">
                        <form method="post" id="save-form2" name="save-form2" enctype="multipart/form-data">
                            <input class="hide" type="text" id="usuario2" name="usuario2" />
                            <div class="card-content black-text">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <div class="row">
                                            <!--campo para ingresar el codigo de confirmación-->
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">vpn_key</i>
                                                <input placeholder="" id="codigo" name="codigo" type="text" class="validate" maxlength="5" required>
                                                <label for="codigo">Ingrese su codigo de confirmación</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                        
                                            <!--Campo para que el cliente ingrese su nueva contraseña-->
                                            <div class="input-field col s6">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="pass1" name="pass1" type="password" class="validate" maxlength="16" required>
                                                <label for="pass1">Ingrese su nueva contraseña</label>
                                            </div>
                                            <!--Campo para confirmar contraseña-->
                                            <div class="input-field col s6">
                                                <input id="pass2" name="pass2" type="password" class="validate" maxlength="16" required>
                                                <label for="pass2">Confirmar contraseña</label>
                                            </div>
                                        
                                </div>
                            </div>
                            <!--Boton para confirmar el cambio de contraseña, se habilita hasta que el código de confirmación ha sido enviado-->
                            <div class="card-action" id="btnconfirmar">
                                <button class="waves-effect orange darken-4 btn" type="submit" id="cambiar" name="cambiar"><i class="material-icons right">save</i>Guardar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</main>

<?php
Sitio_Publico::footerTemplate('recuperar_contra.js');
?>