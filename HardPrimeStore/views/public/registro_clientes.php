<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Crear cuenta');
?>

<main>
    <h4>&nbsp;&nbsp;&nbsp;Crea una cuenta</h4>
    <hr>
    <div class="row">
        <div class="col s12 m12">
            <!--Card en la que el cliente ingresa su información personal-->
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
                        <!--Espacio para subir la imagen del cliente-->
                        <div class="col s12 m4">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn orange darken-4">
                                        <span>Imagen</span>
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
            <!--Card en la que el cliente ingresa las credenciales con las que accederá a su cuenta-->
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
                                    <a class="waves-effect orange darken-4 btn btn-medium right" href="../../views/public/index.php">
                                        <i class="material-icons right">done</i>Crear cuenta
                                    </a>
                                    <br>
                                </div>
                                <div class="container" id="terminos">
                                    <form action="#">
                                        <p>
                                            <label>
                                                <br><br>
                                                <input type="checkbox" class="filled-in" checked="checked" id="check1" />
                                                <span><a href="#modal1" class="modal-trigger"><b> Acepto los terminos de uso</b></a></span>
                                            </label>
                                        </p>
                                    </form>
                                </div>



                                <!--Modal en la que se muestran los terminos y condiciones de la pagina-->
                                <div id="modal1" class="modal">
                                    <div class="modal-content">

                                        <h4>Terminos y Condiciones</h4>
                                        <p>1. ACEPTACIÓN
                                            En el presente documento (en adelante, el “Contrato”) se establecen los términos y condiciones de Robert Half Internacional Empresa de Servicios Transitorios Limitada, con domicilio en Avenida Isidora Goyenechea 2800 Piso 15. Torre Titanium 7550-647 Las Condes, que serán de aplicación al acceso y uso por parte del Usuario de esta página web (el “Sitio Web”). Les rogamos lean atentamente el presente Contrato.
                                            Al acceder, consultar o utilizar el Sitio Web, los Usuarios (“Vd.”, “usted”, “Usuario”, o “usuario”) aceptan cumplir los términos y condiciones establecidos en este Contrato. En caso de que usted no acepte quedar vinculado por los presentes términos y condiciones, no podrá acceder a, ni utilizar, el Sitio Web.
                                            Robert Half Internacional Empresa de Servicios Transitorios Limitada y sus respectivas empresas afiliadas (en conjunto, “RH”) se reservan el derecho de actualizar el presente Contrato siempre que lo consideren oportuno. En consecuencia, recomendamos al Usuario revisar periódicamente las modificaciones efectuadas al Contrato.
                                            El presente Sitio Web está dirigido exclusivamente a personas residentes en Chile. Los Usuarios residentes o domiciliados en otro país que deseen acceder y utilizar el Sitio Web, lo harán bajo su propio riesgo y responsabilidad, por lo que deberán asegurarse de que dichos accesos y/o usos cumplen con la legislación aplicable en su país.</p><br>

                                            <p>2. REQUISITOS RELATIVOS AL USUARIO
                                            El Sitio Web y los servicios relacionados con el mismo se ofrecen a los Usuarios que tengan capacidad legal para otorgar contratos legalmente vinculantes según la legislación aplicable.
                                            Los menores no están autorizados para utilizar el Sitio Web. Si usted es menor de edad, por favor, no utilice esta web.</p><br>

                                            <p>3. LICENCIA
                                            En este acto, RH otorga al Usuario una licencia limitada, no exclusiva, intransferible, no susceptible de cesión y revocable; para consultar y descargar, de forma temporal, una copia del contenido ofrecido en el Sitio Web, únicamente para uso personal del Usuario o dentro de su empresa, y nunca con fines comerciales.
                                            Todo el material mostrado u ofrecido en el Sitio Web, entre otros ejemplos, el material gráfico, los documentos, textos, imágenes, sonido, video, audio, las ilustraciones, el software y el código HTML (en conjunto, el “Contenido”), es de exclusiva propiedad de RH o de las empresas que facilitan dicho material.
                                            El Contenido está protegido por las leyes de copyright chilenas, estadounidenses e internacionales, así como por las demás leyes, reglamentos y normas aplicables a los derechos de propiedad intelectual. Salvo disposición expresa en contrario en el presente contrato, y/o salvo que por imperativo legal ello esté expresamente permitido por leyes derogatorias de las actualmente vigentes, el Usuario no podrá (i) utilizar, copiar, modificar, mostrar, eliminar, distribuir, descargar, almacenar, reproducir, transmitir, publicar, vender, revender, adaptar, invertir el proceso de creación o crear productos derivados a partir de, el Contenido. Tampoco podrá (ii) utilizar el Contenido en otras páginas Web o en cualquier medio de comunicación como, por ejemplo, en un entorno de red, sin la previa autorización por escrito en este sentido de RH.
                                            Todas las marcas comerciales, las marcas de servicio y los logos (en adelante, las “Marcas”) mostrados en el Sitio Web son propiedad exclusiva de RH y de sus respectivos propietarios.
                                            El Usuario no podrá utilizar las Marcas en modo alguno sin la previa autorización por escrito para ello de RH y los respectivos propietarios.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Entendido</a>
                                    </div>
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
Sitio_Publico::footerTemplate('registro_clientes.js');
?>