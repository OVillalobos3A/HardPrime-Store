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
                    <div class="card-content black-text">
                        <div class="row">
                            <div class="col s12 m4">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">person</i>
                                        <input placeholder="" id="codigo" type="text" class="validate">
                                        <label for="first_name">Ingrese su usuario</label>
                                    </div>
                                </div>

                            </div>
                            <!--Boton para enviar el código de confirmación y habilitar el cambio de contraseña-->
                            <br>&nbsp;&nbsp;<a class="waves-effect orange darken-4 btn"><i class="material-icons right">email</i>Enviar código</a>
                        </div>
                        <b>Se ha enviado un código de confirmación a tu correo electronico asociado con este usuario, por favor revisa tu bandeja de entrada y procede a cambiar tu contraseña.</b>
                    </div>
                    <div class="card-action" id="btnconfirmar">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="container">
                    <!--Card en la que el cliente ingresa el código de confirmación y cambia su contraseña-->
                    <div class="card">
                        <div class="card-content black-text">
                            <div class="row">
                                <div class="col s12 m4">
                                    <div class="row">
                                    <!--campo para ingresar el codigo de confirmación-->
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">vpn_key</i>
                                            <input placeholder="" id="codigo" type="text" class="validate">
                                            <label for="first_name">Ingrese su codigo de confirmación</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                    <!--Campo para que el cliente ingrese su nueva contraseña-->
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="first_name" type="text" class="validate">
                                            <label for="first_name">Ingrese su nueva contraseña</label>
                                        </div>
                                        <!--Campo para confirmar contraseña-->
                                        <div class="input-field col s6">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Confirmar contraseña</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--Boton para confirmar el cambio de contraseña, se habilita hasta que el código de confirmación ha sido enviado-->
                        <div class="card-action" id="btnconfirmar">
                            <a class="waves-effect orange darken-4 btn disabled"><i class="material-icons right">save</i>Guardar contraseña</a>
                        </div>

                    </div>
                </div>
            </div>
</main>

<?php
Sitio_Publico::footerTemplate('recuperar_contra.js');
?>