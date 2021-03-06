<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('Crear cuenta');
?>

<main>
    <br>
    <div class="row container">
        <div class="col s12 m12">
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text center-align"><b>Crear cuenta</b></span>
                    <form method="post" id="save-form" enctype="multipart/form-data">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <!--<input class="hide" type="number" id="id_empleado" name="id_empleado" />-->
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombre" type="text" maxlength="25" name="nombre" class="validate" required>
                                <label for="nombre">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellido" type="text" name="apellido" maxlength="25" class="validate" required>
                                <label for="apellido">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo" type="text" name="correo" maxlength="40" class="validate" required>
                                <label for="correo">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">phone</i>
                                <input id="telefono" type="text" name="telefono" maxlength="9" class="validate" required>
                                <label for="telefono">Tel??fono</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">home</i>
                                <input id="direct" type="text" name="direct" maxlength="150" class="validate" required>
                                <label for="direct">Direcci??n</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">date_range</i>
                                <input type="date" id="fecha" name="fecha" class="validate" required />
                                <label for="fecha">Nacimiento</label>
                            </div>
                            <div class="file-field input-field col s12 m6">
                                <div class="btn blue-grey tooltipped" data-tooltip="Seleccione una imagen de 500x500">
                                    <i class="material-icons right">image</i>Imagen
                                    <input id="imagen" type="file" name="imagen" accept=".gif, .jpg, .png">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png">
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">assignment_ind</i>
                                <input id="alias" type="text" name="alias" class="validate" maxlength="10" required />
                                <label for="alias">Usuario</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="clave1" type="password" name="clave1" class="validate" maxlength="16" required />
                                <label for="clave1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="clave2" type="password" name="clave2" class="validate" maxlength="16" required />
                                <label for="clave2">Confirmar clave</label>
                            </div>
                        </div>                        
                        <div class="row center-align">
                            <button class="btn waves-effect light-blue darken-4 tooltipped" type="submit" id="btnregistrar" data-tooltip="Registrarse"><i class="material-icons">check</i></button>
                        </div>
                        <div class="row" id="terminos">
                            <form action="#">
                                <p>
                                    <label>                                        
                                        <input type="checkbox" class="filled-in" id="check1" name="check1" required/>
                                        <span><a href="#modal1" class="modal-trigger"><b> Acepto los terminos de
                                                    uso</b></a></span>
                                    </label>
                                </p>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Terminos y Condiciones</h4>
            <p>1. ACEPTACI??N
                En el presente documento (en adelante, el ???Contrato???) se establecen los t??rminos y condiciones de Robert
                Half Internacional Empresa de Servicios Transitorios Limitada, con domicilio en Avenida Isidora
                Goyenechea 2800 Piso 15. Torre Titanium 7550-647 Las Condes, que ser??n de aplicaci??n al acceso y uso por
                parte del Usuario de esta p??gina web (el ???Sitio Web???). Les rogamos lean atentamente el presente
                Contrato.
                Al acceder, consultar o utilizar el Sitio Web, los Usuarios (???Vd.???, ???usted???, ???Usuario???, o ???usuario???)
                aceptan cumplir los t??rminos y condiciones establecidos en este Contrato. En caso de que usted no acepte
                quedar vinculado por los presentes t??rminos y condiciones, no podr?? acceder a, ni utilizar, el Sitio
                Web.
                Robert Half Internacional Empresa de Servicios Transitorios Limitada y sus respectivas empresas
                afiliadas (en conjunto, ???RH???) se reservan el derecho de actualizar el presente Contrato siempre que lo
                consideren oportuno. En consecuencia, recomendamos al Usuario revisar peri??dicamente las modificaciones
                efectuadas al Contrato.
                El presente Sitio Web est?? dirigido exclusivamente a personas residentes en Chile. Los Usuarios
                residentes o domiciliados en otro pa??s que deseen acceder y utilizar el Sitio Web, lo har??n bajo su
                propio riesgo y responsabilidad, por lo que deber??n asegurarse de que dichos accesos y/o usos cumplen
                con la legislaci??n aplicable en su pa??s.</p><br>

            <p>2. REQUISITOS RELATIVOS AL USUARIO
                El Sitio Web y los servicios relacionados con el mismo se ofrecen a los Usuarios que tengan capacidad
                legal para otorgar contratos legalmente vinculantes seg??n la legislaci??n aplicable.
                Los menores no est??n autorizados para utilizar el Sitio Web. Si usted es menor de edad, por favor, no
                utilice esta web.</p><br>

            <p>3. LICENCIA
                En este acto, RH otorga al Usuario una licencia limitada, no exclusiva, intransferible, no susceptible
                de cesi??n y revocable; para consultar y descargar, de forma temporal, una copia del contenido ofrecido
                en el Sitio Web, ??nicamente para uso personal del Usuario o dentro de su empresa, y nunca con fines
                comerciales.
                Todo el material mostrado u ofrecido en el Sitio Web, entre otros ejemplos, el material gr??fico, los
                documentos, textos, im??genes, sonido, video, audio, las ilustraciones, el software y el c??digo HTML (en
                conjunto, el ???Contenido???), es de exclusiva propiedad de RH o de las empresas que facilitan dicho
                material.
                El Contenido est?? protegido por las leyes de copyright chilenas, estadounidenses e internacionales, as??
                como por las dem??s leyes, reglamentos y normas aplicables a los derechos de propiedad intelectual. Salvo
                disposici??n expresa en contrario en el presente contrato, y/o salvo que por imperativo legal ello est??
                expresamente permitido por leyes derogatorias de las actualmente vigentes, el Usuario no podr?? (i)
                utilizar, copiar, modificar, mostrar, eliminar, distribuir, descargar, almacenar, reproducir,
                transmitir, publicar, vender, revender, adaptar, invertir el proceso de creaci??n o crear productos
                derivados a partir de, el Contenido. Tampoco podr?? (ii) utilizar el Contenido en otras p??ginas Web o en
                cualquier medio de comunicaci??n como, por ejemplo, en un entorno de red, sin la previa autorizaci??n por
                escrito en este sentido de RH.
                Todas las marcas comerciales, las marcas de servicio y los logos (en adelante, las ???Marcas???) mostrados
                en el Sitio Web son propiedad exclusiva de RH y de sus respectivos propietarios.
                El Usuario no podr?? utilizar las Marcas en modo alguno sin la previa autorizaci??n por escrito para ello
                de RH y los respectivos propietarios.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Entendido</a>
        </div>
    </div>
</main>

<?php
Sitio_Publico::footerTemplate('registro_clientes.js');
?>