<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Crear cuenta');
?>

<main>
    <h4>&nbsp;&nbsp;&nbsp;Crea una cuenta</h4>
    <hr>
    <div class="row">
        <div class="col s12 m12">
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>Información personal</b> </span>
                    <div class="row">
                        <form class="col s12 m8">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name" class="blue-grey-text">Primer Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name" class="blue-grey-text">Apellidos</label>
                                </div>
                            </div>
                        </form>
                        <!--Espacio para subir una imagen-->
                        <div class="col s12 m4">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn orange darken-4">
                                        <span >Imagen</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <form class="col s12 m12">
                            <div class="row">
                                <div class="input-field col s6 m3">
                                    <i class="material-icons prefix">email</i>
                                    <input id="correo" type="text" class="validate">
                                    <label for="correo" class="blue-grey-text">Correo</label>
                                </div>
                                <div class="input-field col s6 m3">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="telefono" type="text" class="validate">
                                    <label for="telefono" class="blue-grey-text">Teléfono</label>
                                </div>
                                <div class="input-field col s6 m3">
                                    <i class="material-icons prefix">phone_android</i>
                                    <input id="celular" type="text" class="validate">
                                    <label for="celular" class="blue-grey-text">Celular</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <i class="material-icons prefix">date_range</i>
                                    <input id="fecha" type="text" class="datepicker">
                                    <label for="fecha" class="blue-grey-text">Fecha de nacimiento</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <h6 class="blue-grey-text"><b>&nbsp;&nbsp;&nbsp;Dirección de entrega</b></h6>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">home</i>
                            <textarea id="textarea1" class="materialize-textarea black-text"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col s12 m12">
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>Credenciales de ingreso</b> </span>
                    <div class="row">
                        <form class="col s12 m9">
                            <div class="row">
                                <div class="input-field col s6 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name" class="blue-grey-text">Nombre de usuario</label>
                                </div> 
                            </div>
                        </form>

                    </div>
                    <div class="row">
                        <form class="col s12 m12">
                            <div class="row">
                                <div class="input-field col s6 m4">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="correo" type="text" class="validate">
                                    <label for="correo" class="blue-grey-text">Contraseña</label>
                                </div>
                                
                                <div class="input-field col s6 m3">                                    
                                    <input id="telefono" type="text" class="validate">
                                    <label for="telefono" class="blue-grey-text">Confirmar contraseña</label>
                                </div>
                                <div class="input-field col s6 m3">
                                <br>
                                    <a class="waves-effect orange darken-4 btn btn-medium right"><i class="material-icons right">done</i>Crear cuenta</a><br>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>


</main>

<?php
Sitio_Publico::footerTemplate('initialization.js');
?>