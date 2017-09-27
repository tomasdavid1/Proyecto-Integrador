<!DOCTYPE html>

<?php
session_start();
if($_SESSION){

} else {
  if ($_POST) {
    campoVacio($_POST);
    $errores = validarCampo();
    $logIn = buscarUsuario($_POST);
    if ($logIn['mail']== $_POST['mail'] && password_verify($_POST['password'],$logIn['password']) ) {

      iniciarSesion($logIn);
      header('bienvenido.php');
    }
  }
}



?>
<html>  <head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <link rel="stylesheet" href="registrate2.css">    <link rel="stylesheet" href="animate.css">    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Roboto|Slabo+27px" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Cabin+Sketch:700|Crete+Round|Poiret+One">    <title>Sprint 1</title>  </head>  <body>    <section>      <div class="imagen-logo animated rotateIn">        <img src="logo.jpg" alt="IKIGAI 2017" class="logo">        </div>        <section id=presentacionDeEscritorio>          <div class="tituloDeEscritorio">            IKIGAI          </div>          <img src="logo.jpg" alt="Ikigai 2017" class="ikigai animated rotateIn">        </section>        <section class="formulario animated fadeInRight">          <div class="registrate">            Iniciar Sesión          </div>          <div class="cuerpo">            <form action="iniciar-sesion.php" method="POST">              <div class="campo">                <label for="email">Usuario</label>                <input type="email" name="username" id="email" value="" placeholder="Usuario">              </div>              <div class="campo">                <label for="password">Contraseña</label>                <input type="password" name="password" id="password" value="" placeholder="Contraseña">              </div>              <div class="">
                <button type="button" >Olvide mi contraseña</button>
              </div>
              <div class="enviar">                <button type="submit">                    Enviar                  </button>                </button>                  </div>                </form>            </div>                <div class="mandale">                  <h2 id="tenerunacuenta">¿No tenés una cuenta?<br> <a href="registrate2.html" id="iniciar">¡Registrate!</a></h3>                  </div>                  <div class="redes-sociales">                    <div class="red">                      <img src="signinwithfacebook.png" alt="">                    </div>                    <div class="red">                      <img src="signinwithlinkedin.png" alt="">                    </div>                    <div class="red">                      <img src="signinwithgoogle.png" alt="">                    </div>                  </div>                </section>              </section>              <section>                <div class="facebook">                </div>
                <div class="twitter">                </div>                <div class="google">              </div>        </section>    </body></html>