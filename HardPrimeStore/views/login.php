<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>

    <div class="row">
        <div class="col s12 m8 l4 offset-m2 offset-l4">
            <div class="card">
                <div class="card-image">
                    <img src="../../resources/img/logo.PNG" height="300" width="0">
                    <span class="card-title"></span>
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
                            <div class="form-field center-align">
                                <a class="waves-effect blue-grey btn " id="btniniciar">Iniciar Sesion</a>
                            </div>
                            <br>
                            <a href="recuperar_contra.php" id="link1">Recuperar contraseña</a>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a href="registro_clientes.php" id="link1"><b> Crear una cuenta</b></a>
                </div>
                
            </div>
            <div class="container" id="terminos">
                <form action="#">
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in" checked="checked" id="check1" />
                            <span><a href="#modal1" class="modal-trigger"><b> Terminos de uso</b></a></span>
                        </label>
                    </p>
                </form>
            </div>




            <div id="modal1" class="modal">
                <div class="modal-content">

                    <h4>Terminos y Condiciones</h4>
                    <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Entendido</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
Sitio_Publico::footerTemplate('initialization.js');
?>