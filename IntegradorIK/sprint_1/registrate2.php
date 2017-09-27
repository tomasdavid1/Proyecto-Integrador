<?php

require '../validacion.php';
$email = "";
$nombre = "";
$username = "";
$apellido = "";

if($_POST){

  campoVacio($_POST);
  $errores = validarCampo();
  //var_dump($errores);
  if($errores){
    if(isset($errores["email"])){
      echo $errores["email"];
    } else {
      $email = $_POST["email"];
    }
    if(isset($errores["nombre"])){
      echo $errores["nombre"];
    } else {
      $nombre = $_POST["nombre"];
    }
    if(isset($errores["username"])){
        echo $errores["username"];
    } else {
      $username = $_POST["username"];
    }

    if(isset($errores["apellido"])){
      echo $errores["apelldo"];
    } else {
      $apellido = $_POST["apellido"];
    }

    if(isset($errores["password"])){
      echo $errores["password"];
    } else {
      $password = $_POST["password"];
    }
  } else {
    $datoValido["nombre"] = $_POST["nombre"];
    $datoValido["apellido"] = $_POST["apellido"];
    $datoValido["email"] = $_POST["email"];
    $datoValido["username"] = $_POST["username"];
    $datoValido["password"] = hasheo($_POST);

    json($datoValido);

    iniciarSesion($datoValido);


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
            <div class="campo">
              <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" name="nombre" required placeholder="Nombre" value=' <?php echo $nombre ?>'>
              </div>
              <div class="campo">
                <label for="apellido">Apellido:</label>
                <input id="apellido" type="text" name="apellido" required placeholder="Apellido" value='<?php echo $apellido ?>'>
                </div>
                <div class="campo">
                  <label for="date"> Usuario: </label>
                  <input id="date" type="text" name="username" requiered placeholder="usuario" value='<?php echo $username ?>' placeholder="">
                </div>
                <div class="campo">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" id="email" requiered value='<?php echo $email ?>' placeholder="Escribí tu correo electrónico">
                </div>
                <div class="campo">
                  <label for="password">Contraseña</label>
                  <input type="password" name="password" requiered id="password" value="" placeholder="Contraseña">
                </div>
                <div class="campo">
                  <label for="password">Repetir contraseña</label>
                  <input type="password" name="password2" requiered id="password" value="" placeholder="Repetir contraseña">

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
            <h2 id="tenerunacuenta">¿Ya tenes una cuenta?<br> <a href="iniciar-sesion.<?php  ?>" id="iniciar">Inicia Sesion!</a></h3>

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
