<?php

require '../validacion.php';
$email = "";
$nombre = "";
$username = "";
$apellido = "";

if($_POST){

  $errores = validarCampo();

  if(!$errores){

    $datoValido["nombre"] = $_POST["nombre"];
    $datoValido["apellido"] = $_POST["apellido"];
    $datoValido["email"] = $_POST["email"];
    $datoValido["username"] = $_POST["username"];
    $datoValido["password"] = hasheo($_POST);

    json($datoValido);

    almacenarEnSession($datoValido);

    header('bienvenido.php');

  } else {
    header('registrate2.php');
  }
}
?>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registrate2.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Roboto|Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Cabin+Sketch:700|Crete+Round|Poiret+One" <title>Sprint 1</title>
</head>
  <body>
      <section>
        <div class="imagen-logo animated rotateIn">
          <img src="logo.jpg" alt="IKIGAI 2017" class="logo">
        </div>
      <section id=presentacionDeEscritorio>
        <div class="tituloDeEscritorio">
          IKIGAI
        </div>
        <img src="logo.jpg" alt="Ikigai 2017" class="ikigai animated rotateIn">
      </section>
      <section class="formulario animated fadeInRight">
        <div class="registrate">
          Registrate
        </div>
        <div class="cuerpo">
          <form action="registrate2.php" method="POST">

            <?php if (isset($errores['nombre'])) { ?>
              <div class="errores-de-campo">
               <?php echo  $errores['nombre'] ; ?>
              </div>
            <?php }  ?>
            <div class="campo">
              <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" name="nombre"  placeholder="Nombre" value='<?php echo $nombre ?>'>
              </div>
              <?php if (isset($errores['apellido'])) { ?>
                <div class="errores-de-campo">
                 <?php echo  $errores['apellido'] ; ?>
                </div>
              <?php }  ?>
              <div class="campo">

                <label for="apellido">Apellido:</label>
                <input id="apellido" type="text" name="apellido"  placeholder="Apellido" value='<?php echo $apellido ?>'>
                </div>
                <?php if (isset($errores['username'])) { ?>
                  <div class="errores-de-campo">
                   <?php echo  $errores['username'] ; ?>
                  </div>
                <?php }  ?>
                <div class="campo">
                  <label for="date"> Usuario: </label>
                  <input id="date" type="text" name="username"  placeholder="Usuario" value='<?php echo $username ?>' placeholder="">
                </div>
                <div class="campo">
                  <?php if (isset($errores['email'])) { ?>
                    <div class="errores-de-campo" >
                      <?php echo $errores['email']; ?>
                      </div>
                  <?php }  ?>
                  <label for="email">E-mail</label>
                  <input type="text" name="email" id="email"  value='<?php echo $email ?>' placeholder="E-Mail">
                </div>
                <div class="campo">
                  <?php if (isset($errores['password'])) { ?>
                    <div class="errores-de-campo">
                     <?php echo  $errores['password'] ; ?>
                    </div>
                  <?php }  ?>
                  <label for="password">Contraseña</label>
                  <input type="password" name="password"  id="password" value="" placeholder="Contraseña">
                </div>
                <div class="campo">
                  <label for="password">Repetir contraseña</label>
                  <input type="password" name="password2"  id="password" value="" placeholder="Repetir contraseña">

                </div>

                <div class="enviar">
                  <button type="submit">
                    Enviar
                  </button>
                </button>
              </div>
            </form>
          </div>
          <div class="mandale">
            <h2 id="tenerunacuenta">¿Ya tenes una cuenta?<br> <a href="iniciar-sesion.php" id="iniciar">Inicia Sesion!</a></h3>

            </div>
            <div class="redes-sociales">
            <div class="red">
              <img src="signinwithfacebook.png" alt="">
            </div>
            <div class="red">
              <img src="signinwithlinkedin.png" alt="">

            </div>

  <div class="red">
    <img src="signinwithgoogle.png" alt="">
  </div>
</div>
          </section>
        </section>
        <section>
              <div class="facebook">
              </div>
              <div class="twitter">
              </div>
              <div class="google">
              </div>
        </section>
      </body>
</html>
