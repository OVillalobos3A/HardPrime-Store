<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Servicio al cliente');
?>

<main>
    <div class="row">
        <div class="col s12 m12">
            <div class="container">
                <h4>Formulario para comentarios</h4>
                <hr>
                <!--Card para que el cliente envíe su comentario-->
                <div class="card ">
                    <div class="card-content black-text">
                        <div class="row">
                            <!--Combobox para que el cliente elija el tipo de comentario que desea enviar-->
                            <div class="input-field col s12 m5 black-text">
                                <h6><b>¿Qué tipo de comentario desea enviar?</b></h6>
                                <select id="select">
                                    <option value="0">Duda</option>
                                    <option value="1">Negativo</option>
                                    <option value="2">Positivo</option>
                                    <option value="3">Constructivo</option>
                                </select>
                            </div>
                        </div>
                        <!--TextField para que el cliente escriba su comentario-->
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h6><b>Escribe tu comentario </b></h6>
                                        <textarea id="textarea1" class="materialize-textarea black-text"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-action" id="btnconfirmar">
                        <a class="waves-effect orange darken-4 btn"> <i class="material-icons right">send</i>Enviar
                            comentario</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card whithe">
                            <div class="card-content">
                                <span class="card-title">Otras formas de contacto:</span>
                                <!--Apartado con información de otras formas de contacto-->
                                <div class="card-panel blue-grey lighten-5">
                                    <span class="black-text">
                                        Teléfonos: 0580-0000/1212-12-12
                                    </span>
                                </div>
                                <div class="card-panel blue-grey lighten-5">
                                    <span class="black-text">
                                        Correo: HardprimeSupport@gmail.com
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card whithe">
                            <div class="card-content">
                                <span class="card-title">Recuerda:</span>
                                <!--Apartado con información de otras formas de contacto-->
                                <div class="card-panel blue-grey lighten-5 center-align">
                                    <span class="black-text">
                                        ¡Será un gusto atenderte!
                                    </span>
                                </div>
                                <div class="card-panel blue-grey lighten-5 center-align">
                                    <span class="black-text">
                                        ¡Estaremos al pendiente de tus comentarios y dudas!
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
Sitio_Publico::footerTemplate('servicio_al_cliente.js');
?>