<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Mi cuenta');
?>
<main>
    <h4>&nbsp;&nbsp;&nbsp;Mi cuenta</h4>
    <hr>
    <div class="row">
        <div class="col s12 m12">
            <div class="card ">
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
                                <img class="responsive-img" src="../../resources/img/user.png" width="75">
                            </div>
                            <div class="col s12 m9">
                                <form action="#">
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
                    <div class="row">
                        <div class="col s12 m12">
                            <h5 class="blue-grey-text"><b> Direcciones registradas</b> <a href="" id="agregar_direc" class="orange-text text-darken-4"><u>Agregar dirección</u> <i class="tiny material-icons">add_circle</i></a></h5>
                            <div class="card grey lighten-2">
                                <div class="card-content black-text">
                                    <span class="card-title blue-grey-text"><a class="btn-floating right btn-small btn tooltipped waves-effect waves-light orange darken-4" data-position="right" data-tooltip="remover"><i class="material-icons">remove</i></a><a class="btn-floating right btn-small tooltipped waves-effect waves-light orange darken-4" data-position="bottom" data-tooltip="editar dirección"><i class="material-icons">edit</i></a></b></span>
                                    <h5><b>Casa</b></h5>

                                    <div class="row">
                                        <div class="col s12 m2">
                                            <br><i class="medium material-icons">home</i>
                                        </div>
                                        <div class="col s12 m10">
                                            <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum sunt laborum alias repudiandae quam sapiente vel dolores culpa soluta! Porro veniam voluptatem illo, quos vel tenetur enim quae ipsum. lore</h6>
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
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>
                            <h5>Comentarios realizados
                        </b></h5></span>
                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Comentario constructivo</b><a class="btn-floating right btn-small tooltipped waves-effect waves-light red" data-position="left" data-tooltip="editar dirección"><i class="material-icons">close</i></a></h6>

                            <div class="row">
                                <div class="col s12 m12">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum sunt laborum alias repudiandae quam sapiente vel dolores culpa soluta! Porro veniam voluptatem illo, quos vel tenetur enim quae ipsum. lore</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h6><b> &nbsp;&nbsp;Respuesta:</b></h6>
                                <div class="col s12 m12">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum sunt laborum alias repudiandae quam sapiente vel dolores culpa soluta! Porro veniam voluptatem illo, quos vel tenetur enim quae ipsum. lore</h6>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Comentario positivo</b><a class="btn-floating right btn-small tooltipped waves-effect waves-light red" data-position="left" data-tooltip="editar dirección"><i class="material-icons">close</i></a></h6>

                            <div class="row">
                                <div class="col s12 m12">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum sunt laborum alias repudiandae quam sapiente vel dolores culpa soluta! Porro veniam voluptatem illo, quos vel tenetur enim quae ipsum. lore</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h6><b> &nbsp;&nbsp;Respuesta:</b></h6>
                                <div class="col s12 m12">
                                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum sunt laborum alias repudiandae quam sapiente vel dolores culpa soluta! Porro veniam voluptatem illo, quos vel tenetur enim quae ipsum. lore</h6>
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
            <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title blue-grey-text"><b>
                            <h5>Pedidos realizados
                        </b></h5></span>
                    <div class="card grey lighten-2">
                        <div class="card-content black-text">
                            <h6><b>Pedido No. 1 - 15/03/2020 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             Calificar pedido:</b> 
                            <div class="ec-stars-wrapper" id="calificar">                            
                                        <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                        <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                        <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                        <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                        <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                                    </div></h6>
                            <div class="row">
                                <div class="col s12 m12">
                                    <h6><b> Detalle:</b></h6>
                                    <h6> Monitor HP 1800 - $250.00</h6>
                                    <h6> Tarjeta gráfica ASUS 1800TI - $450.00</h6>
                                    <h6>Envío: $10.00</h6>
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
Sitio_Publico::footerTemplate('initialization.js');
?>