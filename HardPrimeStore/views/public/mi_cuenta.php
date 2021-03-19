<?php
//Se incluye la clase con las plantillas del documento
include('../../app/Helpers/public/sitio_publico.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Sitio_Publico::headerTemplate('HardPrimeStore - Mi cuenta');
?>

<main>
    <h4>&nbsp;&nbsp;&nbsp;Mi cuenta</h4>
    <hr>
    <div class="row">
        <div class="col s12 m12">
            <!--Sección en la que el cliente puede ver su información y editarla-->
            <div class="card">
                <!--Contenido de la card conla info del cliente-->
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>Información personal&nbsp;&nbsp;</b><a href="" id="editar_info" class="orange-text text-darken-4"><u><b> Editar información</b></u> <i class="tiny material-icons">edit</i></a> <a href="" id="cambiar_contra" class="orange-text text-darken-4"><u><b> Cambiar contraseña</b></u> <i class="tiny material-icons">edit</i></a></span>
                    <div class="row">
                        <div class="col s12 m3">
                            <br>
                            <h6><b>Nombre de Ejemplo</b></h6>
                        </div>
                        <div class="col s12 m3">
                            <br>
                            <h6><b>usuario@example.com</b></h6>
                        </div>
                        <div class="col s12 m1">
                            <br>
                            <h6><b>Imagen:</b></h6>
                        </div>
                        <div class="col s12 m5">
                            <div class="col s12 m3">
                                <img class="responsive-img" src="../../resources/img/public/user.png" width="75">
                            </div>
                            <!--Apartado para que el cliente pueda cambiar su imagen-->
                            <div class="col s12 m9">
                                <form action="#">
                                    <!--Boton para que el cliente suba la imagen-->
                                    <div class="file-field input-field">
                                        <div class="btn orange darken-4">
                                            <span>Examinar</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4">
                            <h6><b>Telefono/Celular:</b> 2121-2121/1111-1111</h6>
                        </div>
                        <div class="col s12 m4">
                            <h6><b>Fecha de nacimiento:</b> 20/09/2000</h6>
                        </div>
                    </div>
                    <!--Creacion del apartado donde el cliente puede ver y editar la dirección que tiene registrada-->
                    <div class="row">
                        <div class="col s12 m12">
                            <h5 class="blue-grey-text"><b> Dirección registrada</b> <a href="" id="agregar_direc" class="orange-text text-darken-4"><u>Editar dirección</u> <i class="tiny material-icons">edit</i></a></h5>
                            <div class="card grey lighten-2">
                                <div class="card-content black-text">
                                    <span class="card-title blue-grey-text"></b></span>
                                    <h5><b>Casa</b></h5>

                                    <div class="row">
                                        <div class="col s12 m1">
                                            <br><i class="medium material-icons">home</i>
                                        </div>
                                        <div class="col s12 m11">
                                            <h6>Centro Comercial plaza Mundo 1er. nivel parqueo sur local #88, Boulevard del Ejercito Nacional Km 5 1/2, calle Montecarmelo, Soyapango.</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Sección donde el cliente puede ver sus comentarios y su respectiva respuesta-->
    <div class="row">
        <div class="col s12 m12">
            <!--Card que contiene las cards con los comentarios realizados-->
            <div class="card">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>
                            <h5>Comentarios realizados
                        </b></h5></span>
                    <!--Creacion de las cards con los comentarios realizados con sus respuestas-->
                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Pregunta</b><a class="btn-floating right btn-small tooltipped waves-effect waves-light red" data-position="left" data-tooltip="editar dirección"><i class="material-icons">close</i></a></h6>

                            <div class="row">
                                <div class="col s12 m12">
                                    <h6>¿Cómo puedo cambiar la dirección que tengo registrada?</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h6><b> &nbsp;&nbsp;Respuesta:</b></h6>
                                <div class="col s12 m12">
                                    <h6>En la sección de "mi cuenta", en el apartado de direcciones registradas esta el boton de editar dirección, espero haberte ayudado</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Comentario negativo</b><a class="btn-floating right btn-small tooltipped waves-effect waves-light red" data-position="left" data-tooltip="editar dirección"><i class="material-icons">close</i></a></h6>

                            <div class="row">
                                <div class="col s12 m12">
                                    <h6>Recibí un producto que no fue lo que esperaba, ademas el precio me parecio muy elevado</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h6><b> &nbsp;&nbsp;Respuesta:</b></h6>
                                <div class="col s12 m12">
                                    <h6>Sin respuesta todavía</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Sección donde el cliente puede ver los pedidos que ha realizado-->
    <div class="row">
        <div class="col s12 m12">
            <!--Card principal que contiene las cards con los pedidos-->
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>
                            <h5>Pedidos realizados
                        </b></h5></span>
                    <!--Creacion de las cards con los pedidos realizados-->
                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Pedido No. 1 - 15/03/2020</b>
                            </h6>
                            <div class="row">
                                <div class="col s12 m12">
                                    <h6><b> Detalle:</b></h6>
                                    <h6> Monitor HP 1800 - $250.00 - <a href="" id="editar_info" class="orange-text text-darken-4"><u> Calificar Producto</u></a></h6>
                                    <h6> Tarjeta gráfica ASUS 1800TI - $450.00 - <a href="" id="editar_info" class="orange-text text-darken-4"><u> Calificar Producto</u></a></h6>
                                    <h6>Envío: $10.00 - <a href="" id="editar_info" class="orange-text text-darken-4"><u> Calificar Producto</u></a></h6>
                                    <h6 class="orange-text text-darken-3"><b>Total: $710.00</b></h6>

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
Sitio_Publico::footerTemplate('public_index.js');
?>