<?php
include('../../app/Helpers/public/sitio_publico.php');
Sitio_Publico::headerTemplate('HardPrimeStore - Carrito de compras');
?>
<main>
    <div class="row">
        <div class="col s12 m8 l4 offset-m2 offset-l4">
        <!--Card que contiene el formulario de inicio de sesion-->
            <div class="card">            
                <div class="card-image">
                    <img src="../../resources/img/public/Logo3.png" height="200" width="300">
                    <span class="card-title"></span>
                </div>
                <div class="card-content">
                <!--Formularios para usuario y contraseña-->
                    <div class="form-field">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                <!--Campo para que el cliente ingrese su usuario-->
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
                                <!--Campo para que el cliente ingrese su contraseña-->
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
                <!--Link para crear una cuenta-->
                <div class="card-action">
                    <a href="registro_clientes.php" id="link1"><b> Crear una cuenta</b></a>
                </div>
                
            </div>           
        </div>
    </div>
</main>

<?php
Sitio_Publico::footerTemplate('login.js');
?>